<?php 

namespace App\Modules\Employees\Services\Interfaces;

interface EmployeeServiceInterface
{
    public function store($request);

    public function show($employee);

    public function update($request, $employee);

    public function destroy($employee);
}