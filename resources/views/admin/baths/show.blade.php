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
                             <th>@lang('Codigo QR')</th>
                            <td field-key='code_qr'>{{ $bath->code_qr }}</td>
                        </tr>
                        <tr>
                             <th>@lang('Compañia')</th>
                            <td field-key='company'>{{ $bath->company }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->


            <p>&nbsp;</p>

            <a href="{{ route('admin.baths.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
