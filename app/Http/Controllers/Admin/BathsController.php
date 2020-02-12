<?php

namespace App\Http\Controllers\Admin;

use App\Bath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBathsRequest;
use App\Http\Requests\Admin\UpdateBathsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BathsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Bath.
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
            $baths = Bath::onlyTrashed()->get();
        } else {
            $baths = Bath::all();
        }

        return view('admin.baths.index', compact('baths'));
    }
    
   /**
     * Show the form for creating new Bath.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }

        return view('admin.baths.create');
    }

        /**
     * Store a newly created Bath in storage.
     *
     * @param  \App\Http\Requests\StoreBathsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBathsRequest $request)
    {
        if (! Gate::allows('property_create')) {
            return abort(401);
        }

        $request  = $this->saveFiles($request);
        $baths = Bath::create($request->all());

        return redirect()->route('admin.baths.index');
    }


}
