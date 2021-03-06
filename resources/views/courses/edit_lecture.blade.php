@extends('app')
@section('content')
    <body style="overflow: hidden">
    <div id="gornjalinija"></div>
    <div id="learn"><a href="/main">LEARN_ON</a></div>
    <div id="podvucena"></div>
    <div style="width:80%; left:17.5%; text-align:center; position:absolute;">
        {!! Form::open(['url'=>'/delete_lecture/'.$lecture->id, 'method'=>'POST']) !!}
        <button type="submit" class="addqu" id="del" style="cursor: pointer; position:absolute; height:45px; width:150px; left:90%; top:0%; ">{!! Html::image('img/delete.png','Error404',['class'=>'addqu','style'=>' position:absolute; height:45px; width:150px; left:0; top:0%;  ']) !!}</button>
        {!! Form::close() !!}
        <section style="font-size:2em; font-family: Intro_Bold"> - LECTURE EDITOR - </section>
    </div>
    @include('partials._levi_meni')
    {!! Form::open(['url'=>'lecture_pdf','method'=>'POST']) !!}
    <div>Choose a PDF:<input name="pdf" type="file" style="position:relative; left:290px; top:-150px;"/></div>
    {!! Form::close() !!}

    <div id="polje4">
        <div class="width">
            <div class="form-group">
                {!! Form::model($lecture, (['method'=>'PATCH' , 'url'=>['lectureUpdate', $lecture->id]]))!!}
                {!! Form::text('lecture_title',null,['class' => 'width','id'=>'course_title','placeholder'=>'LECTURE TITLE HERE...','autocomplete'=>'off']) !!}
            </div>
            <div id="textbox_linija"></div>
            {!! Html::image('img/paper.png','ERROR 404',['style'=>'position:relative;left:20px; top:20px;']) !!}
            <div id="video">Video URL:</div>
            {!! Form::text('video',null,['placeholder'=>'https://www.youtube.com/example','style'=>'position:relative; border:1; border-style:dashed; left:260px; top:-164px; width:500px; ']) !!}
            <hr class="width" style="position:relative; top:13px; width: 97.5%; left: -17px; height: 2px; background-color: black; ">
            <div id="bottom_content">
                <div>
                    <div class="form-group">
                        {!! Form::textarea('body',null,['class' => 'width','style'=>'border: dashed red 2px; position:relative; top:58px; height: 175px; font-size: 1.5em; resize: none;', 'placeholder'=>'Description...']) !!}
                    </div>
                    <button type="submit" class="addqu" style="cursor: pointer;  position:absolute; left:27px;  top:67%; width:1265px; height:254px;">{!! Html::image('img/editlec.png','Error404',['class'=>'addqu','style'=>' position:absolute; left:0%; top:0%;  width:1265px; height:254px;']) !!}</button>
                    {!!Form::close()!!}
                </div>
            </div>
            <div  style="position: absolute; top:160px; font-size:20px; left: 172px">
                {!! Form::open(['url'=>'lecture_pdf','method'=>'POST', 'files'=>true]) !!}
                {!! Form::hidden('id',$lecture->id) !!}
                Change the PDF:<div style="width: 350px; overflow: hidden">{!! Form::file('pdf',null,['accept'=>'.pdg','style'=>'width:200px']) !!}</div> {!! Form::submit('Upload PDF', ['class'=>'btn1']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </body>
@endsection
@section('footer')
    @if (count($errors) > 0)
        <script>swal("Whoops!","There were some problems with your input.<?php foreach ($errors->all() as $error)
    {
        echo e($error);
    }
    ?>","error")</script>
    @endif

    <script>
        $('#del').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this lecture",
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

    @if (Session::has('pdf_edited'))<script>swal({
            title:"Good job!",
            text:"You successfully changed the pdf",
            type:"success",
            timer:2000,
        })</script>
    @endif

@stop