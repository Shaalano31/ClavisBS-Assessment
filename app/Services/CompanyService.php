<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Mail\NewCompany;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreCompany;

class CompanyService
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    // Retrieve all companies
    public function getAll()
    {
        return $this->company->get();
    }

    // Insert company into database
    public function store(Request $request, StoreCompany $validate)
    {
        $formFields = $validate->all();

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('', 'public');
        }

        Company::create($formFields);

        $mailData = [
            'name' => $request->name,
            'website' => $request->website
        ];

        Mail::to('khaled.shaalan.031@gmail.com')->send(new NewCompany($mailData));
    }

    // Update company details
    public function update(Request $request, Company $company, StoreCompany $validate)
    {
        $formFields = $validate->all();

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('', 'public');
        }

        $company->update($formFields);
    }

    // Delete company
    public function delete(Company $company) {

        $company->delete();
    }

}