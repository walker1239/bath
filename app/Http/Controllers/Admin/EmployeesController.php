<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEmployeesRequest;
use App\Http\Requests\Admin\UpdateEmployeesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class EmployeesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('property_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('property_delete')) {
                return abort(401);
            }
            $employees = Employee::onlyTrashed()->get();
        } else {
            $employees = Employee::all();
        }

        return view('admin.employees.index', compact('employees'));
    }
      
   /**
     * Show the form for creating new Employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }

        return view('admin.employees.create');
    }

        /**
     * Store a newly created Employee in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }

        $request  = $this->saveFiles($request);
        $employees = Employee::create($request->all());

        return redirect()->route('admin.employees.index');
    }

    

    /**
     * Show the form for editing Employee.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }

        $employees = Employee::findOrFail($id);

        return view('admin.employees.edit', compact('employees'));
    }

    /**
     * Update Employee in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, $id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }

        $request  = $this->saveFiles($request);
        $employees = Employee::findOrFail($id);
        $employees->update($request->all());

        return redirect()->route('admin.employees.index');
    }


    /**
     * Display Employee.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('property_view')) {
            return abort(401);
        }

        $employees  = Employee::findOrFail($id);

        return view('admin.employees.show', compact('employees'));
    }


    /**
     * Remove Employee from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $employees = Employee::findOrFail($id);
        $employees->delete();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Delete all selected Employee at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        if ($request->input('ids')) {
            $entries = Employee::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Employee from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $employees = Employee::onlyTrashed()->findOrFail($id);
        $employees->restore();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Permanently delete Employee from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $employees = Employee::onlyTrashed()->findOrFail($id);
        $employees->forceDelete();

        return redirect()->route('admin.employees.index');
    }

}
