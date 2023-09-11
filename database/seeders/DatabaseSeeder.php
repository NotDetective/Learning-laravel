<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminUser = User::factory()->create([
            'username' => 'FredEx',
            'email' => 'fred@ex.com',
            'password' => 'password',
            'remember_token' => Str::random(10),
        ]);


        Task::factory(10)->create();

        $role = Role::factory()->create([
            'name' => 'admin',
        ]);

        $role->users()->attach($adminUser);

        $permissions = [
            'account edit' => [
                'name' => 'Edit Account',
                'system_name' => 'account_edit',
                'object' => 'account',
                'action' => 'edit',
            ],
            'permission add' => [
                'name' => 'Add Permission',
                'system_name' => 'permission_add',
                'object' => 'permissions',
                'action' => 'add',
            ],
            'permission edit' => [
                'name' => 'Edit Permission',
                'system_name' => 'permission_edit',
                'object' => 'permissions',
                'action' => 'edit',
            ],
            'role add' => [
                'name' => 'Add Role',
                'system_name' => 'role_add',
                'object' => 'roles',
                'action' => 'add',
            ],
            'role show' => [
                'name' => 'Show Role',
                'system_name' => 'role_show',
                'object' => 'roles',
                'action' => 'show',
            ],
            'role edit' => [
                'name' => 'Edit Role',
                'system_name' => 'role_edit',
                'object' => 'roles',
                'action' => 'edit',
            ],
            'task add' => [
                'name' => 'Add Task',
                'system_name' => 'task_add',
                'object' => 'tasks',
                'action' => 'add',
            ],
            'task edit' => [
                'name' => 'Edit Task',
                'system_name' => 'task_edit',
                'object' => 'tasks',
                'action' => 'edit',
            ],
        ];

        foreach ($permissions as $permission) {
            $p = Permission::factory()->create([
                'name' => $permission['name'],
                'system_name' => $permission['system_name'],
                'object' => $permission['object'],
                'action' => $permission['action'],
            ]);
            $role->permissions()->attach($p);
        }

    }
}
