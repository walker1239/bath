@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baths.title')</h3>
    
    {!! Form::model($bath, ['method' => 'PUT', 'route' => ['admin.baths.update', $bath->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('code_qr', trans('Codigo QR').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('code_qr', old('code_qr'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('code_qr'))
                        <p class="help-block">
                            {{ $errors->first('code_qr') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company', trans('Compañia').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company'))
                        <p class="help-block">
                            {{ $errors->first('company') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

