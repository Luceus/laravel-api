<?php 

namespace App\Modules\Employees\Services;

use App\Helpers\TransformerResponse;
use App\Modules\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Modules\Employees\Services\Interfaces\EmployeeServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployeeService implements EmployeeServiceInterface
{
    private $employeeRepository;
    private $transformerResponse;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, TransformerResponse $transformerResponse)
    {
        $this->employeeRepository = $employeeRepository;
        $this->transformerResponse = $transformerResponse;
    }

    public function store($request)
    {
        // prepare data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        try {
            $result = $this->employeeRepository->createEmployee($data);
            return $this->transformerResponse->response(
                false,
                $result->toArray(),
                TransformerResponse::HTTP_CREATED,
                TransformerResponse::CREATE_SUCCESS_MESSAGE
            );
        } catch (QueryException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR,
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR . ' | ' . $e->getMessage()
            );
        }
    }

    public function show($employee)
    { 
        try {
            $result = $this->employeeRepository->findEmployee($employee);
            return $this->transformerResponse->response(
                false,
                $result->toArray(),
                TransformerResponse::HTTP_OK,
                TransformerResponse::GET_SUCCESS_MESSAGE
            );
        } catch (QueryException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR,
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR . ' | ' . $e->getMessage()
            );
        }
    }

    public function update($request, $employee)
    {
        $data = $request->all();
        try {
            $result = $this->employeeRepository->updateEmployee($data, $employee->id);
            return $this->transformerResponse->response(
                false,
                $result->toArray(),
                TransformerResponse::HTTP_OK,
                TransformerResponse::UPDATE_SUCCESS_MESSAGE
            );
        } catch (QueryException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR,
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR . ' | ' . $e->getMessage()
            );
        }  
    }

    public function destroy($employee)
    {
        try {
            $result = $this->employeeRepository->deleteEmployee($employee->id);
            if ($result == 1) $result = 'Delete success';
            return $this->transformerResponse->response(
                false,
                [$result],
                TransformerResponse::HTTP_OK,
                TransformerResponse::DELETE_SUCCESS_MESSAGE
            );
        } catch (QueryException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR,
                TransformerResponse::HTTP_INTERNAL_SERVER_ERROR . ' | ' . $e->getMessage()
            );
        }
    }
}