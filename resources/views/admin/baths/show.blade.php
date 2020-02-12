@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baths.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('latitud')</th>
                            <td field-key='latitude'>{{ $bath->latitude }}</td>
                        </tr>
                        <tr>
                            <th>@lang('logitud')</th>
                            <td field-key='longitude'>{{ $bath->longitude }}</td>
                        </tr>
                        <tr>
                            <th>@lang('codigo_qr')</th>
                            <td field-key='code_qr'>@if($bath->code_qr)<a href="{{ asset(env('UPLOAD_PATH').'/' . $bath->code_qr) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $bath->code_qr) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->


            <p>&nbsp;</p>

            <a href="{{ route('admin.baths.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
