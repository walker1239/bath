@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.companys.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('Nombre')</th>
                            <td field-key='name'>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('Usuario')</th>
                            <td field-key='user'>{{ $company->user }}</td>
                        </tr>
                        <tr>
                            <th>@lang('Contraseña')</th>
                            <td field-key='password'>{{ $company->password }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->


            <p>&nbsp;</p>

            <a href="{{ route('admin.companys.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
