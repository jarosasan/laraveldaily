<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\CompanyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.companies_list', ['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company_create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $file='';
        if ($request->hasFile('logo')) {
            $file = $request->file('logo')->store('public/images');
            $file = basename($file);
        }

        Company::create($request->except( '_token', 'logo')+['logo'=>$file]);
        Mail::send('mail.mail', ['company' => $request->name], function ($m) use ($request) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($request->email, $request->name)->subject('Your Reminder!');
        });
        return redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.company_edit_form', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {

        $company = Company::findOrfail($id);
        $file = $company->logo;
        if ($request->hasFile('logo')) {
            Storage::delete('public/images/'.$company->logo);
            $file = $request->file('logo')->store('public/images');
            $file = basename($file);
        }
        $company->update($request->except('_token', 'logo')+['logo'=>$file]);
        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp = Company::findOrFail($id);
        if($comp->logo){
           Storage::delete('public/images/'.$comp->logo);
        }
        $comp->delete();
        return redirect(route('companies.index'));
    }
}
