<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(5);
        $companies  = Company::all();
        return view('employees.index', compact('employees','companies'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = Company::all();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'first_name'    =>  'required',
            'last_name'    =>  'required',
            'company_id'        =>'nullable',
            'email'        =>'nullable',
            'phone'=> 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect('employees')
                        ->withErrors($validator)
                        ->withInput();
        }
      

        // $image = $request->file('image');

        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);

        
         $employees = new Employee;

        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->email = $request->email;
        $employees->company_id = $request->company;
        $employees->phone = $request->phone;

        $employees->save();

        return redirect('employees')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::findOrFail($id);
        return view('employees.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        $companies  = Company::all();
        return view('employees.edit', compact('data','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
            'first_name'    =>  'required',
            'last_name'    =>  'required',
            'email'        =>'nullable',
            'company_id'=> 'nullable',
            'phone'=> 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect('employees.create')
                        ->withErrors($validator)
                        ->withInput();
        }
          $employees = Employee::find($id);

        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->email = $request->email;
        $employees->company_id = $request->company;
        $employees->phone = $request->phone;

        $employees->save();
        

        return redirect('employees')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = Employee::findOrFail($id);
        $data->delete();

        return redirect('employees')->with('success', 'Data is successfully deleted');
    }
}
