
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
        <!--{ Form::input('date','published_at',$article->published_at->format('Y-m-d'),['class'=>'form-control'])}-->
        <!-- remove format because it handle on model article.php-->
        {!! Form::input('date','published_at',$article->published_at,['class'=>'form-control'])!!}
    </div>

     <div class="form-group">
        {!! Form::label('tag_list','Tags:')!!}
        {!! Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','multiple'])!!}
    </div>

        <div class="form-group">
        {!! Form::submit($submitButtonText,['class'=>'form-btn btn-primary form-control'])!!}
    </div>

    @section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            /*
            tags:true,
            ajax:{
                type:"post",
                dataType:'json',
                url:'api/tags',
                delay:250,
                processRusults:function(data){
                    return {results:data}
                }
            }
            */
        });
    </script>
    @endsection