<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $permissions = [
        //tabla roles
        'ver-rol',
        'crear-rol',
        'editar-rol',
        'borrar-rol',
        //tabla de cursos
        'ver-cursos',
        'crear-cursos',
        'editar-cursos',
        'borrar-cursos'
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach($this->permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'Super Adminisrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
