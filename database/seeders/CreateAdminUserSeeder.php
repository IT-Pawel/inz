<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $role = Role::create(['name' => 'Pracownik']);

        $permissions = [
            'zlecenie-list',
            'zlecenie-create',
            'zlecenie-edit'
        ];

        $role->syncPermissions($permissions);

    }
}
