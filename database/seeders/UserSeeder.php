<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Self::loadUsers();
    }

    private function loadUsers(){
        DB::table('users')->delete();

        $admin = new User();
        $admin->name = 'administrador';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->roles = 'admin';
        $admin->curso_id = 1;
        $admin->materia_id = 1;
        $admin->save();

        $alumno1 = new User();
        $alumno1->name = 'user';
        $alumno1->email = 'user@gmail.com';
        $alumno1->password = bcrypt('12345678');
        $alumno1->roles = 'alumno';
        $alumno1->curso_id = 4;
        $alumno1->materia_id = 2;
        $alumno1->save();

        $alumno1 = new User();
        $alumno1->name = 'profesor';
        $alumno1->email = 'profe@gmail.com';
        $alumno1->password = bcrypt('12345678');
        $alumno1->roles = 'profesor';
        $alumno1->curso_id = 4;
        $alumno1->materia_id = 2;
        $alumno1->save();

    }
}
