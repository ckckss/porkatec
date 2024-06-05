<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $rol_admin = Role::create(['name' => 'admin']);
        $rol_encargado = Role::create(['name' => 'encargado']);
        $rol_usuario = Role::create(['name' => 'usuario']);


        $permiso_create_cerda = Permission::create(['name' => 'create_cerda']);
        $permiso_read_cerda = Permission::create(['name' => 'read_cerda']);
        $permiso_update_cerda = Permission::create(['name' => 'update_cerda']);
        $permiso_delete_cerda = Permission::create(['name' => 'delete_cerda']);

        $permiso_create_user = Permission::create(['name' => 'create_user']);
        $permiso_read_user = Permission::create(['name' => 'read_user']);
        $permiso_update_user = Permission::create(['name' => 'update_user']);
        $permiso_delete_user = Permission::create(['name' => 'delete_user']);

        $permiso_create_nave = Permission::create(['name' => 'create_nave']);
        $permiso_read_nave = Permission::create(['name' => 'read_nave']);
        $permiso_update_nave = Permission::create(['name' => 'update_nave']);
        $permiso_delete_nave = Permission::create(['name' => 'delete_nave']);

        $permiso_admin_bypass = Permission::create(['name' => 'admin_bypass']);

        $permisos_admin = [
            $permiso_create_cerda, $permiso_read_cerda, $permiso_update_cerda, $permiso_delete_cerda,
            $permiso_create_user, $permiso_read_user, $permiso_update_user, $permiso_delete_user,
            $permiso_create_nave, $permiso_read_nave, $permiso_update_nave, $permiso_delete_nave,
            $permiso_admin_bypass
        ];

        $permisos_encargado = [
            $permiso_create_cerda, $permiso_read_cerda, $permiso_update_cerda,
            $permiso_create_user, $permiso_read_user, $permiso_update_user,
            $permiso_create_nave, $permiso_read_nave, $permiso_update_nave,
        ];

        $permisos_usuario = [
            $permiso_create_cerda, $permiso_read_cerda, $permiso_update_cerda,
            $permiso_read_nave,
        ];

        $rol_admin->syncPermissions($permisos_admin);
        $rol_encargado->syncPermissions($permisos_encargado);
        $rol_usuario->syncPermissions($permisos_usuario);

    }
}
