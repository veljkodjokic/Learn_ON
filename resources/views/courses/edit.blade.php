@extends('app')

@section('content')
    <body  style="overflow: hidden">
    <div id="gornjalinija"></div>
    <div id="learn"><a href="/main">LEARN_ON</a></div>
    <div id="podvucena"></div>
    <div style="width:80%; left:17.5%; text-align:center; position:absolute;">
        {!! Form::open(['url'=>'/delete_course/'.$course->id, 'method'=>'POST']) !!}
        <button type="submit" class="addqu" id="del" style="cursor: pointer; position:absolute; height:45px; width:150px; left:90%; top:0%; ">{!! Html::image('img/delete.png','Error404',['class'=>'addqu','style'=>' position:absolute; height:45px; width:150px; left:0; top:0%;  ']) !!}</button>
        {!! Form::close() !!}
        <section style="font-size:2em; font-family: Intro_Bold"> - COURSE EDITOR - </section>
    </div>
    @include('partials._levi_meni')
    <div id="polje4">
        <div class="width" id="markup">
            <div class="form-group">
                {!! Form::model($course, (['method'=>'PATCH' , 'action'=>['CoursesController@update', $course->id]]))!!}
                {!! Form::text('title',null,['class' => 'width','id'=>'course_title','placeholder'=>'COURSE TITLE HERE...','autocomplete'=>'off']) !!}
            </div>
            <div id="wrapping_content" >
                <div>
                    <div id="thumbnail">
                        {!! Html::image('img/courses/'.$course->thumbnail,'error404',['style'=>'height: 190px; width: 350px;']) !!}
                    </div>
                    <section style="position:relative; top:30px;display: inline">
                        <div class="form-group" style="position:relative; left: 5%;">
                            {!! Form::label('published_at','Publish on:') !!}
                            {!! Form::input('date','published_at',$course->published_at->format('Y-m-d'),['id'=>'filename','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group" style="position:relative; top:20px; left:5%;">
                            {!! Form::label('tag_list','Category:') !!}
                            {!! Form::select('tag_list[]',$tags,null,['id'=>'tag_list','class'=>'form-control','style'=>'font-family:Exo_bold; width:250px', 'placeholder' =>'Choose Category...']) !!}
                        </div>
                    </section>
                </div>
            </div>
            <hr class="width" style="position:relative; top:160px; width: 97.5%; left: -24%; height: 2px; background-color: black; ">
            <div id="bottom_content">
                <div>
                    <div class="form-group">
                        {!! Form::textarea('body',null,['class' => 'width','id'=>'text_area', 'placeholder'=>'Description...']) !!}
                    </div>
                    <button type="submit" class="addqu" style="cursor: pointer;  position:absolute; left:27px;  top:67%; width:1265px; height:254px;">{!! Html::image('img/editco.png','Error404',['class'=>'addqu','style'=>' position:absolute; left:0%; top:0%;  width:1265px; height:254px;']) !!}</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div  style="position: absolute; top:245px; left: 400px">
                {!! Form::open(['url'=>'course_img','files'=>true, 'method'=>'POST']) !!}
                {!! Form::hidden('id',$course->id) !!}
                Change the thumbnail:<div style="width: 350px; overflow: hidden">{!! Form::file('thumbnail',null,['accept'=>'image/*','style'=>'width:200px']) !!}</div> {!! Form::submit('Upload Image', ['class'=>'btn1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection
    @section('footer')
        @if (count($errors) > 0)
            <script>swal("Whoops!!","There were some problems with your input.<?php foreach ($errors->all() as $error)
    {
        echo e($error);
    }
    ?>","error")</script>
        @endif
        <script>
            $('#tag_list').select2({
                placeholder:'Choose tags'
            });
            $(".js-example-theme-multiple").select2({
                theme: "classic"
            });
        </script>

        @if (Session::has('img_edited'))<script>swal({
                title:"Good job!",
                text:"You successfully changed the thumbnail",
                type:"success",
                timer:2000,
            })</script>
        @endif

        <script>
            $('#del').on('click',function(e){
                e.preventDefault();
                var form = $(this).parents('form');
                swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this course",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, delete it!",
                            allowEscapeKey: true,
                            allowOutsideClick:false
                        },
                        function(isConfirm){
                            if (isConfirm)
                            {
                                form.submit();
                            }
                        });})
        </script>
    </body>
@stop