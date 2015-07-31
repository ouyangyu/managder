<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>国开Moodle后台管理</title>
        {{ HTML::style('css/bootstrap.min.css') }}
                {{ HTML::style('css/main.css') }}

        <!--[if lt IE 9]>
            {{ HTML::script('js/html5shiv.js',array('type'=>'text/javascript')) }}
            {{ HTML::script('js/respond.min.js',array('type'=>'text/javascript')) }}
         <![endif]-->

    </head>

    <body>


        {{--<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand hidden-sm" href="/">Laravel新手上路</a>
                </div>
                <ul class="nav navbar-nav navbar-right hidden-sm">
                @if(!Auth::check())

                
                    <li>{{ HTML::link('users/register', '注册') }}</li>
                    <li>{{ HTML::link('users/login', '登陆') }}</li>
                
                @else
                <li>{{ HTML::link('users/logout', '退出') }}</li>
                @endif
                </ul>
            </div>
        </div>--}}
        <div class="container summary">

        <div class="page-header">
            <h1>方正 <small>国开出版社Moodle管理后台</small></h1>
        </div>
        <div class="row" style="text-align: center">
            @if(Session::has('message'))
                        <p class="alert">{{ Session::get('message') }}</p>
                        @endif
        </div>


            {{ $content }}
        </div>
{{ HTML::script('js/jquery-1.11.1.min.js',array('type'=>'text/javascript')) }}
{{ HTML::script('js/bootstrap.min.js',array('type'=>'text/javascript')) }}
    </body>
</html>