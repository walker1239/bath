@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.employees.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                             <th>@lang('Nombre:')</th>
                            <td field-key='name'>{{ $employees->name }}</td>
                        </tr>
                        <tr>
                             <th>@lang('Telefono:')</th>
                            <td field-key='phone'>{{ $employees->phone }}</td>
                        </tr>
                        <tr>
                             <th>@lang('Email:')</th>
                            <td field-key='user'>{{ $employees->user }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->


            <p>&nbsp;</p>

            <a href="{{ route('admin.employees.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
