<?php 

namespace App\Modules\Employees\Repositories;

use App\Modules\Employees\Models\Employee;
use App\Modules\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function createEmployee($data)
    {
        return Employee::create($data);
    }

    public function findEmployee($employee)
    {
        return Employee::find($employee);
    }

    /**
     * 
     * @param mixed $data 
     * @param mixed $id 
     * @return mixed 
     */
    public function updateEmployee($data, $id)
    {
        return Employee::where('id', $id)->update($data);
    }

    public function deleteEmployee($id)
    {
        return Employee::destroy($id);
    }
}