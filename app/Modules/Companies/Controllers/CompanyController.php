<?php

namespace App\Modules\Companies\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Requests\StoreCompanyRequest;
use App\Modules\Companies\Requests\UpdateCompanyRequest;
use App\Modules\Companies\Services\CompanyService;

class CompanyController extends Controller
{
    private $companyService;
    
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
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
     * @param  \App\Modules\Companies\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        return $this->companyService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $this->companyService->show($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modules\Companies\Requests\UpdateCompanyRequest  $request
     * @param  \App\Modules\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        return $this->companyService->update($request, $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        return $this->companyService->destroy($company);
    }
}
