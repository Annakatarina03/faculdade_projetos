<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         * Criando o usuário administrador do sistema
         */

        /**
         * @var Office $office
         */

        $office = Office::find(1);

        /**
         * @var Employee $employee
         */

        $employee = $office->employees()->create([
            'name' => 'Administrador',
            'cpf' => '00000000000',
            'username' => 'administrador',
            'date_entry' => now(),
            'wage' => 0,
            'password' => Hash::make('administrador')
        ]);

        $employee->assignRole('Administrador');
    }
}
