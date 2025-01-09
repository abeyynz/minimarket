<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::with('store')->get();
        return view('users.index', $data);
    }

    public function create()
    {
        $data['stores'] = Store::all();
        return view('users.create', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'store_id' => ['required', 'exists:stores,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'store_id' => $request->store_id,
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        return redirect()->back();
    }

    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        $data['stores'] = Store::all();
        return view('users.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
            'store_id' => 'nullable|exists:stores,id',
        ]);

        if ($request->password) {
            $validate['password'] = Hash::make($request->password);
        } else {
            unset($validate['password']);
        }

        $user->update($validate);

        if ($user) {
            $notification = array(
                'message' => 'Data user berhasil diperbarui.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Data user gagal diperbarui.',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('user')->with($notification);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = array(
            'message' => 'User berhasil dihapus.',
            'alert-type' => 'success'
        );

        return redirect()->route('user')->with($notification);
    }
}
