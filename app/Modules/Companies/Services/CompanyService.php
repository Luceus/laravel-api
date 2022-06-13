<?php 

namespace App\Modules\Companies\Services;

use App\Helpers\TransformerResponse;
use App\Modules\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Modules\Companies\Services\Interfaces\CompanyServiceInterface;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompanyService implements CompanyServiceInterface
{
    private $companyRepository;
    private $transformerResponse;

    public function __construct(CompanyRepositoryInterface $companyRepository, TransformerResponse $transformerResponse)
    {
        $this->companyRepository = $companyRepository;
        $this->transformerResponse = $transformerResponse;
    }

    public function store($request)
    {
        // prepare data
        $data = $request->all();
        try {
            $result = $this->companyRepository->createCompany($data);
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

    public function show($company)
    {
        try {
            $result = $this->companyRepository->findCompany($company);
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
        } catch (NotFoundHttpException $e) {
            return $this->transformerResponse->response(
                true,
                [],
                TransformerResponse::HTTP_NOT_FOUND,
                TransformerResponse::NOT_FOUND_MESSAGE . ' | ' . $e->getMessage()
            );
        }
    }

    public function update($request, $company)
    {
        $data = $request->all();
        try {
            $result = $this->companyRepository->updateCompany($data, $company->id);
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

    public function destroy($company)
    {
        try {
            $this->companyRepository->deleteCompany($company->id);
            return $this->transformerResponse->response(
                false,
                [],
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