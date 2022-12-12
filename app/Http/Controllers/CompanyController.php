<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
    public function store(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Company::create($formFields);

        return redirect('/companies');
    }

    // Show Edit Form
    public function edit(Company $company) {
        return view('companies.edit', ['company' => $company]);
    }

    // Update Listing Data
    public function update(Request $request, Company $company) {

        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
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