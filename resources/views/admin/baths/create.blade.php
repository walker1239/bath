@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baths.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.baths.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('latitude', trans('Latitud').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('latitude', old('latitude'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('latitude'))
                        <p class="help-block">
                            {{ $errors->first('latitude') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('longitude', trans('Longitud').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('longitude', old('longitude'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('longitude'))
                        <p class="help-block">
                            {{ $errors->first('longitude') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code_qr', trans('global.baths.fields.code_qr').'', ['class' => 'control-label']) !!}
                    {!! Form::file('code_qr', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('code_qr_max_size', 2) !!}
                    {!! Form::hidden('code_qr_max_width', 4096) !!}
                    {!! Form::hidden('code_qr_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('code_qr'))
                        <p class="help-block">
                            {{ $errors->first('code_qr') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

