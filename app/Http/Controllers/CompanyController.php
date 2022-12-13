<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompany;
use App\Models\Company;
use App\Mail\NewCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    // Show all companies
    public function index() {
        return view('companies.index', [
            'companies' => Company::latest()->get()
        ]);
    }

    // Show Create Form
    public function create() {
        return view('companies.create');
    }

    // Store Company detail
    public function store(Request $request, StoreCompany $validate) {

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

        return redirect('/companies');
    }

    // Show Edit Form
    public function edit(Company $company) {
        return view('companies.edit', ['company' => $company]);
    }

    // Update Listing Data
    public function update(Request $request, Company $company, StoreCompany $validate) {

        $formFields = $validate->all();

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('', 'public');
        }

        $company->update($formFields);

        return redirect('/companies');
    }

    // Delete Company
    public function destroy(Company $company) {

        $company->delete();
        return redirect('/companies');
    }
}
