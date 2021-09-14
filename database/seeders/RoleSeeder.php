<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Seller']);

        Permission::create(['name'=>'nullSell'])->assignRole($role1);
        Permission::create(['name'=>'admin.medicamentos'])->assignRole($role1);
        Permission::create(['name'=>'admin.stocks'])->assignRole($role1);
    }
}
