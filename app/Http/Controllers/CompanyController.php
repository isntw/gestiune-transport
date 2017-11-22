<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Requests\Company\StoreCompanyRequest;

class CompanyController extends Controller {

    public function index() {
        $actions = [
            ['href' => route('companies.create'), 'title' => 'Adauga Firma'],
        ];
        $companies = \App\Company::orderBy('created_at', 'desc')->get();
        return view('companies.index')
                        ->with('title', 'Firme')
                        ->with('actions', $actions)
                        ->with('companies', $companies);
    }

    public function create() {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request) {
        return \DB::transaction(function () use ($request) {
                    Company::create($request->only('name', 'cui', 'note'));
                    \Toastr::success('Firma a fost creata cu succes');
                    return redirect(route('companies.index'));
                }, 5);
    }

    public function edit(Company $company) {
        return view('companies.edit')
                        ->with('company', $company);
    }

    public function update(UpdateCompanyRequest $request, Company $company) {
        return \DB::transaction(function () use ($request, $company) {
                    $company->update($request->only('name', 'cui', 'note'));
                    \Toastr::success('Firma a fost modificata cu succes');
                    return redirect()->route('companies.index');
                }, 5);
    }

}
