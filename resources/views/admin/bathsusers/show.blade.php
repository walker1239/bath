@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baths_users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.baths_users.fields.bath')</th>
                            <td field-key='bath'>{{ $bathsuser->bath->id or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.baths_users.fields.user')</th>
                            <td field-key='user'>{{ $bathsuser->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.baths_users.fields.bathsuser-text')</th>
                            <td field-key='latitude'>{!! $bathsuser->time_exit !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.baths_users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
