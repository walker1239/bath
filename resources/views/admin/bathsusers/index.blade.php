@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Baños Atendidos')</h3>


    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.bathsusers.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.bathsusers.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($bathsusers) > 0 ? 'datatable' : '' }} @can('note_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('note_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('Foto')</th>    
                        <th>@lang('Codigo Baño')</th>
                        <th>@lang('Empleado')</th>
                        <th>@lang('Compañia')</th>
                        <th>@lang('Hora de Entrada')</th>
                        <th>@lang('Hora de Salida')</th>
                        <th>@lang('Latitud')</th>
                        <th>@lang('Longitud')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bathsusers) > 0)
                        @foreach ($bathsusers as $bathsusers)
                            <tr data-entry-id="{{ $bathsusers->id }}">
                                @can('note_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='bathsusers'>@if($bathsusers->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $bathsusers->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $bathsusers->photo) }}"/></a>@endif</td>
                                <td field-key='user'>{{ $bathsusers->code_qr}}</td>
                                <td field-key='bathsusers'>{!! $bathsusers->name!!}</td>
                                <td field-key='bathsusers'>{!! $bathsusers->company!!}</td>
                                <td field-key='bathsusers'>{!! $bathsusers->time_entry !!}</td>
                                <td field-key='bathsusers'>{!! $bathsusers->time_exit !!}</td>
                                <td field-key='bathsusers'>{!! $bathsusers->latitude!!}</td>
                                <td field-key='bath'>{{ $bathsusers->longitude}}</td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bathsusers.restore', $bathsusers->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bathsusers.perma_del', $bathsusers->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('note_edit')
                                    <a href="{{ route('admin.bathsusers.edit',[$bathsusers->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('note_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bathsusers.destroy', $bathsusers->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('note_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bathsusers.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection