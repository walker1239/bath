@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.notes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.notes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>

        <div class="panel-body">

            <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('photo', trans('global.bathsusers.fields.photo').'', ['class' => 'control-label']) !!}
                        {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                        {!! Form::hidden('photo_max_size', 2) !!}
                        {!! Form::hidden('photo_max_width', 4096) !!}
                        {!! Form::hidden('photo_max_height', 4096) !!}
                        <p class="help-block"></p>
                        @if($errors->has('photo'))
                            <p class="help-block">
                                {{ $errors->first('photo') }}
                            </p>
                        @endif
                    </div>
            </div>



            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('bath_id', trans('global.notes.fields.bath').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('bath_id', $baths, old('bath_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bath_id'))
                        <p class="help-block">
                            {{ $errors->first('bath_id') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note_text', trans('global.notes.fields.note-text').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('note_text', old('note_text'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('note_text'))
                        <p class="help-block">
                            {{ $errors->first('note_text') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

