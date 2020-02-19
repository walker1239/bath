<?php

namespace App\Http\Controllers\Admin;
use App\Bath;
use App\Bathsuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBathsusersRequest;
use App\Http\Requests\Admin\UpdateBathsusersRequest;


class BathsusersController extends Controller
{
    /**
     * Display a listing of Bathsuser.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('note_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('note_delete')) {
                return abort(401);
            }
            $bathsusers = Bathsuser::onlyTrashed()->get();
        } else {
            $user = \Auth::user();
            
          $bathsusers = Bathsuser::all();

           //$bathsusers = Bathsuser::join();
            $bathsusers = Bathsuser::
            join('baths', 'baths.id', '=', 'bathsusers.baths_id')
            ->join('employees', 'bathsusers.employees_id', '=', 'employees.id')
            ->select('baths.code_qr','employees.name','bathsusers.time_entry','bathsusers.time_exit','bathsusers.latitude','bathsusers.longitude','bathsusers.photo','baths.company')
            ->where('company','=', $user->company)
            ->get();
            
       
       
        }

        return view('admin.bathsusers.index', compact('bathsusers'));
    }
    

    /**
     * Store a newly created Bathsuser in storage.
     *
     * @param  \App\Http\Requests\StoreBathsusersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBathsusersRequest $request)
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }

        $request  = $this->saveFiles($request);
        $bathsusers = Bathsuser::create($request->all());

        return redirect()->route('admin.bathsusers.index');
    }


    /**
     * Show the form for editing Bathsuser.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }

        $bathsusers = Bathsuser::findOrFail($id);

        return view('admin.bathsusers.edit', compact('bathsusers'));
    }

    /**
     * Update Bathsuser in storage.
     *
     * @param  \App\Http\Requests\UpdateBathsusersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBathsusersRequest $request, $id)
    {
        if (! Gate::allows('property_edit')) {
            return abort(401);
        }

        $request  = $this->saveFiles($request);
        $bathsusers = Bathsuser::findOrFail($id);
        $bathsusers->update($request->all());

        return redirect()->route('admin.bathsusers.index');
    }


    /**
     * Display Bathsuser.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('property_view')) {
            return abort(401);
        }

        $bathsusers  = Bathsuser::findOrFail($id);

        return view('admin.bathsusers.show', compact('bathsusers'));
    }


    /**
     * Remove Bathsuser from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $bathsusers = Bathsuser::findOrFail($id);
        $bathsusers->delete();

        return redirect()->route('admin.bathsusers.index');
    }

    /**
     * Delete all selected Bathsuser at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        if ($request->input('ids')) {
            $entries = Bathsuser::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Bathsuser from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $bathsuser = Bathsuser::onlyTrashed()->findOrFail($id);
        $bathsuser->restore();

        return redirect()->route('admin.bathsusers.index');
    }

    /**
     * Permanently delete Bathsuser from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('property_delete')) {
            return abort(401);
        }

        $bathsuser = Bathsuser::onlyTrashed()->findOrFail($id);
        $bathsuser->forceDelete();

        return redirect()->route('admin.bathsusers.index');
    }


}
