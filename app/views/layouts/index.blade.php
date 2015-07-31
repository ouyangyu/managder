<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>国开Moodle后台管理</title>
        {{ HTML::style('css/bootstrap.min.css') }}
                {{ HTML::style('css/index.css') }}

        <!--[if lt IE 9]>
            {{ HTML::script('js/html5shiv.js',array('type'=>'text/javascript')) }}
            {{ HTML::script('js/respond.min.js',array('type'=>'text/javascript')) }}
         <![endif]-->
{{ HTML::script('js/jquery-1.11.1.min.js',array('type'=>'text/javascript')) }}
{{ HTML::script('js/bootstrap.min.js',array('type'=>'text/javascript')) }}

    </head>

    <body>
            {{ $content }}
        <div class="row" style="text-align: center">
                @if(Session::has('message'))
                       <p class="alert">{{ Session::get('message') }}</p>
                   @endif
         </div>


    </body>
</html>