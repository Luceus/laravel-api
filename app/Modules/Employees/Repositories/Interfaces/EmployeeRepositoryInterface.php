<?php 

namespace App\Modules\Employees\Repositories\Interfaces;

interface EmployeeRepositoryInterface
{
    public function createEmployee($data);

    public function findEmployee($employee);

    public function updateEmployee($data, $id);

    public function deleteEmployee($id);
}