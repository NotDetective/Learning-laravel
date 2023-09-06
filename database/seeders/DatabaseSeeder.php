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
        Task::factory(10)->create();

        User::factory()->create([
            'username'=>'FredEx',
            'email'=>'fred@ex.com',
            'password'=>'password',
            'remember_token' => Str::random(10),
        ]);

        Role::factory()->create([
            'name'=>'admin',
        ]);

        $permissions = [
            'users' => [
                'show',
                'create',
            ]
        ];

        Permission::factory()->create([
            'name'=>'edit user',
            'system_name'=>'edit_user',
            'object'=>'user',
            'action'=>'edit',
        ]);
        Permission::factory()->create([
            'name'=>'delete user',
            'system_name'=>'delete_user',
            'object'=>'user',
            'action'=>'delete',
        ]);

    }
}
