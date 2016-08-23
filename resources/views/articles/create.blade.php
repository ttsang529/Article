@extends('app')

@section('content')
    <h1>Write a New Article</h1>
    <br\>
    {!! Form::open(['url'=>'articles'])!!}
    <div class="form-group">
        {!! Form::label('title','Title:')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>

     <div class="form-group">
        {!! Form::label('body','Body:')!!}
        {!! Form::textarea('body',null,['class'=>'form-control'])!!}
    </div>
    
    <div class="form-group">
        {!! Form::label('updated_at','Updated AT:')!!}
        <!--{!! Form::input('date','updated_at',date('Y-m-d'),['class'=>'form-control'])!!}-->
        {!! Form::input('date','published_at',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control'])!!}
    </div>

        <div class="form-group">
        {!! Form::submit('Add Article',['class'=>'form-btn btn-primary form-control'])!!}
    </div>
    {!! Form::close()!!}
@stop