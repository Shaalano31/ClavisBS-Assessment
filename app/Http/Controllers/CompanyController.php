<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Mail\NewCompany;
use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{

    protected $companyService;

    // Constructor
    public function __construct(CompanyService $companyService) {
        $this->companyService = $companyService;
    }
    
    // Show all companies
    public function index() {
        return view('companies.index', [
            'companies' => $this->companyService->getAll()
        ]);
    }

    // Show Create Form
    public function create() {
        return view('companies.create');
    }

    // Store Company detail
    public function store(Request $request, StoreCompany $validate) {

        $this->companyService->store($request, $validate);

        return redirect('/companies');
    }

    // Show Edit Form
    public function edit(Company $company) {
        return view('companies.edit', ['company' => $company]);
    }

    // Update Listing Data
    public function update(Request $request, Company $company, StoreCompany $validate) {

        $this->companyService->update($request, $company, $validate);

        return redirect('/companies');
    }

    // Delete Company
    public function destroy(Company $company) {

        $this->companyService->delete($company);

        return redirect('/companies');
    }
}
