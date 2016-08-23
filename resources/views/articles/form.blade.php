
    <div class="form-group">
        {!! Form::label('title','Title:')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!}
    </div>

     <div class="form-group">
        {!! Form::label('body','Body:')!!}
        {!! Form::textarea('body',null,['class'=>'form-control'])!!}
    </div>
    
    <div class="form-group">
        {!! Form::label('published','Publish On:')!!}
        <!--{!! Form::input('date','updated_at',date('Y-m-d'),['class'=>'form-control'])!!}-->
        {!! Form::input('date','published_at',Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control'])!!}
    </div>

        <div class="form-group">
        {!! Form::submit($submitButtonText,['class'=>'form-btn btn-primary form-control'])!!}
    </div>