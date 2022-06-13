<?php

namespace App\Modules\Companies\Services\Interfaces;

interface CompanyServiceInterface
{
    public function store($request);

    public function show($company);

    public function update($request, $company);

    public function destroy($company);
}