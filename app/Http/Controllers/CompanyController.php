<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies = Company::latest()->paginate(5);
        return view('companies.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable',
            'website' => 'nullable',
            'logo' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect('companies')
                ->withErrors($validator)
                ->withInput();
        }
        $path = '';
        if($request->file('logo')!='')
        $path = $request->file('logo')->store('avatars', 'public');
        $companies = new Company;

        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->logo = $path;
        $companies->website = $request->website;

        $companies->save();

        return redirect('companies')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Company::findOrFail($id);
        return view('companies.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Company::findOrFail($id);
        return view('companies.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable',
            'website' => 'nullable',
            'logo' => 'nullable'
        ]);
        $image_name = $request->hidden_image;
        //dd($image_name);
        $path = '';

        if($request->file('logo')!='')
        $path = $request->file('logo')->store('avatars', 'public');
        else if($image_name!='')
            $path = $image_name;

//        $path = Storage::putFileAs(
//            'avatars', $request->file('logo'), $request->user()->id
//        );

        if ($validator->fails()) {
            return redirect('companies.create')
                ->withErrors($validator)
                ->withInput();
        }


        $companies = Company::find($id);

        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->logo = $path;
        $companies->website = $request->website;

        $companies->save();


        return redirect('companies')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::findOrFail($id);
        $data->delete();

        return redirect('companies')->with('success', 'Data is successfully deleted');
    }
}
