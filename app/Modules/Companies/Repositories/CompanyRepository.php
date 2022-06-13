<?php 

namespace App\Modules\Companies\Repositories;

use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function createCompany($data)
    {
        return Company::create($data);
    }

    public function findCompany($company)
    {
        return Company::find($company);
    }

    public function updateCompany($data, $id)
    {
        $company = Company::find($id);
        $company->update($data);
        return $company;
    }

    public function deleteCompany($id)
    {
        return Company::destroy($id);
    }
}