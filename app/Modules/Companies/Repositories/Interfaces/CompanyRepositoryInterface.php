<?php 

namespace App\Modules\Companies\Repositories\Interfaces;

interface CompanyRepositoryInterface
{
    public function createCompany($data);

    public function findCompany($company);

    public function updateCompany($data, $id);

    public function deleteCompany($id);
}