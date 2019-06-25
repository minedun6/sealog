<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = new Role();
        $admin_role->code = 'admin';
        $admin_role->value = 'Administrateur';
        $admin_role->save();

        $manager_role = new Role();
        $manager_role->code = 'manager';
        $manager_role->value = 'Gestionnaire';
        $manager_role->save();

        $guest_role = new Role();
        $guest_role->code = 'guest';
        $guest_role->value = 'Visiteur';
        $guest_role->save();
    }
}
