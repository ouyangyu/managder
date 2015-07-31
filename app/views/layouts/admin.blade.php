<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>国开Moodle后台管理</title>
        {{ HTML::style('css/bootstrap.min.css') }}

        <!--[if lt IE 9]>
            {{ HTML::script('js/html5shiv.js',array('type'=>'text/javascript')) }}
            {{ HTML::script('js/respond.min.js',array('type'=>'text/javascript')) }}
         <![endif]-->
{{ HTML::script('js/jquery-1.11.1.min.js',array('type'=>'text/javascript')) }}
{{ HTML::script('js/bootstrap.min.js',array('type'=>'text/javascript')) }}
 <style>
        .ui.navbar {
            height: 100%;
            width:80px;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border: 0;
            background-color: #3e474e;
            min-height: 540px;
        }

        .ui.navbar .nav-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .nav-pills>li>a:hover {
            color: #fff;
            background-color: #428bca;
        }
        .nav-bottom>li>a:hover{
            color:#fff;
            background-color: #3e474e;

        }
        .headertitle {
            text-align: center;
            margin-top:50px;
            font-size: 24px;
            color: #35b550;
            font-weight: 800;
        }
        #loading {
                width: 100%;
                height: 2px;
                overflow: hidden;
                background: #f3f3f3;
        }
        #loading .loading-length {
            width: 0;
            height: 2px;
            overflow: hidden;
            background: #35b558;
            background: -webkit-gradient(linear,10% 10%,100% 100%,color-stop(0.14,#35b550),color-stop(0.5,#8aca8c),color-stop(1,#2d85ca));
        }
        .dataheader {
            margin-top: 40px;
            text-align: center;
            font-weight: 500;
            font-size: 18px;
            margin-left: 50px;
            margin-right: 50px;
        }
        .dataheader .row{
            border-bottom: 1px solid #1b809e;
        }
        .modal{
            text-align: center;
        }
        .modal .row{
            margin-top: 20px;
        }
        .table>thead>tr>th{
                border-color:#35b558;
                text-align: center;
        }
        .table>tbody>tr>td{
                        border-color:#35b558;
                        text-align: center;
                }
.table>tbody>tr>td>img{
                        width: 140px;
                        height: 140px;
                }
    </style>
    </head>

    <body>
       <div class="ui navbar ng-scope" ng-controller="NavbarCtrl">
           <ul class="nav nav-pills nav-stacked">
               <li class="logo">
                   <a ng-href="/" data-toggle="tooltip" data-placement="right" data-original-title="主页" href="{{ URL::to('home/index') }}">
                       <i class="glyphicon glyphicon-blackboard"></i>
                   </a>
               </li>
               <li class="@if(Route::currentRouteAction() == 'AdminController@getIndex') {{ 'active' }} @endif">
                   <!-- ngIf: enable.buildflow -->
                   <a ng-href="/build-flows"data-toggle="tooltip" data-placement="right" title="平台管理" href="{{ URL::to('admin/index') }}">
                       <img src="{{ URL::asset('images/shop.svg') }}"></a><!-- end ngIf: enable.buildflow -->
                   <!-- ngIf: !enable.buildflow -->
               </li>
               <li class="@if(Route::currentRouteAction() == 'AdminController@getUsers') {{ 'active' }} @endif">
                   <!-- ngIf: enable.buildflow -->
                   <a  data-toggle="tooltip" data-placement="right" title="平台用户" href="{{ URL::to('admin/users') }}">
                       <img src="{{ URL::asset('images/user.svg') }}" alt="平台用户"></a><!-- end ngIf: enable.buildflow -->
                   <!-- ngIf: !enable.buildflow -->
               </li>
               <li class="@if(Route::currentRouteAction() == 'AdminController@getMoodle') {{ 'active' }} @endif">
                   <!-- ngIf: enable.buildflow -->
                   <a href="{{ URL::to('admin/moodle') }}" data-toggle="tooltip" data-placement="right" title="Moodle课程" class="ng-scope">
                       <img src="{{ URL::asset('images/applist3.svg') }}" alt="Moodle课程" style="  height: 32px;width: 32px"></a><!-- end ngIf: enable.buildflow -->
                   <!-- ngIf: !enable.buildflow -->
               </li>

               <li class="@if(Route::currentRouteAction() == 'AdminController@getApp') {{ 'active' }} @endif">
                   <a href="{{ URL::to('admin/app') }}" data-toggle="tooltip" data-placement="right" title="APP版本"><img src="{{ URL::asset('images/server.svg') }}" alt="APP版本"></a>
               </li>
           </ul>

           <ul class="nav nav-bottom">

               <li >
                   <a data-toggle="tooltip" data-placement="right" title="退出" href="/settings/organization" aria-hidden="true" class="ng-hide">
                       <img src="{{ URL::asset('images/tuichu.png') }}" alt="tuichu"></a>
               </li>
           </ul>
       </div>
       <!-- 主要内容 -->
       <div class="container summary" >

                     {{ $content }}



       </div>


       <script>
           $(function () {
               $('[data-toggle="tooltip"]').tooltip();
               /*$('[data-toggle="tooltip"]').click(function() {
                    var title = $(this).attr("title");
                        $("#left_title").text(title);
               });*/

           })

       </script>


    </body>
</html>