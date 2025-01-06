<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'read-activity']);
        Permission::create(['name'=>'read-stock-history']);

        Permission::create(['name'=>'create-store']);
        Permission::create(['name'=>'read-store']);
        Permission::create(['name'=>'update-store']);
        Permission::create(['name'=>'delete-store']);

        Permission::create(['name'=>'create-user']);
        Permission::create(['name'=>'read-user']);
        Permission::create(['name'=>'update-user']);
        Permission::create(['name'=>'delete-user']);

        Permission::create(['name'=>'create-transaction']);
        Permission::create(['name'=>'read-transaction']);

        Permission::create(['name'=>'create-product']);
        Permission::create(['name'=>'read-product']);
        Permission::create(['name'=>'update-product']);
        Permission::create(['name'=>'delete-product']);

        Permission::create(['name'=>'create-category']);
        Permission::create(['name'=>'read-category']);
        Permission::create(['name'=>'update-category']);
        Permission::create(['name'=>'delete-category']);

        Role::create(['name'=>'owner']);
        Role::create(['name'=>'manager']);
        Role::create(['name'=>'supervisor']);
        Role::create(['name'=>'cashier']);
        Role::create(['name'=>'inventory']);

        $roleOwner=Role::findByName('owner');
        $roleOwner->givePermissionTo('read-product');
        $roleOwner->givePermissionTo('read-transaction');
        $roleOwner->givePermissionTo('create-store');
        $roleOwner->givePermissionTo('read-store');
        $roleOwner->givePermissionTo('update-store');
        $roleOwner->givePermissionTo('delete-store');

        $roleManager=Role::findByName('manager');
        $roleManager->givePermissionTo('read-product');
        $roleManager->givePermissionTo('read-transaction');
        $roleManager->givePermissionTo('create-user');
        $roleManager->givePermissionTo('read-user');
        $roleManager->givePermissionTo('update-user');
        $roleManager->givePermissionTo('delete-user');

        $roleSupervisor=Role::findByName('supervisor');
        $roleSupervisor->givePermissionTo('read-activity');
        $roleSupervisor->givePermissionTo('read-stock-history');

        $roleCashier=Role::findByName('cashier');
        $roleCashier->givePermissionTo('create-transaction');
        $roleCashier->givePermissionTo('read-transaction');

        $roleInventory=Role::findByName('inventory');
        $roleInventory->givePermissionTo('create-product');
        $roleInventory->givePermissionTo('read-product');
        $roleInventory->givePermissionTo('update-product');
        $roleInventory->givePermissionTo('delete-product');
        $roleInventory->givePermissionTo('create-category');
        $roleInventory->givePermissionTo('read-category');
        $roleInventory->givePermissionTo('update-category');
        $roleInventory->givePermissionTo('delete-category');
    }
}
