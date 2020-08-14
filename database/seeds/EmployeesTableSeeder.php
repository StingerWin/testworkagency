<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 100; $i++)
        $factory = factory(\App\Employee::class, 501)->create();

//        $employees = \App\Employee::all();
//
//        foreach ($employees as $employee) {
//            $employee_id = !$employees->isEmpty() ? $employees->pluck('id')->random() : null;
//            $employee->update(['head_id' => $employee_id]);
//        }

    }
}
