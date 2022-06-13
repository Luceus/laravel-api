<?php

namespace App\Modules\Employees\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Employees\Models\Employee;
use App\Modules\Employees\Requests\StoreEmployeeRequest;
use App\Modules\Employees\Requests\UpdateEmployeeRequest;
use App\Modules\Employees\Services\Interfaces\EmployeeServiceInterface;

class EmployeeController extends Controller
{
    private $employeeService;
    
    public function __construct(EmployeeServiceInterface $employeeServiceInterface)
    {
        $this->employeeService = $employeeServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Modules\Employees\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        return $this->employeeService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Employees\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $this->employeeService->show($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modules\Employees\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Modules\Employees\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        return $this->employeeService->update($request, $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Employees\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return $this->employeeService->destroy($employee);
    }
}
