
<!-- 顶部导航 -->
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Founder</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {{{ Auth::user()->username }}}
                     <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::to('users/logout') }}">退出</a></li>

                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- 主要内容 -->
<div class="container">

    <div class="row" style="text-align: center;height: 40px">
        <p id="tip_title"></p>
    </div>

    <div class="row" style="padding-left: 45px;">
        <div class="row">
            <a class="icon-view col-md-2" href="{{ URL::to('admin/index') }}" tip-title="平台管理：管理所有的Moodle平台。">
                <div class="icon-wrapper">
                    <div class="icon-img">
                        <img src="{{ URL::asset("images/shop.svg") }}" class="glyphicon glyphicon-user img-rounded">
                    </div>
                    <div class="icon-name">平台管理</div>
                </div>
            </a>
            <a class="icon-view col-md-2" href="{{ URL::to('admin/users') }}" tip-title="平台用户：用户手机号码验证，并与云书院绑定。">
                <div class="icon-wrapper">
                    <div class="icon-img">
                        <img src="{{ URL::asset("images/user.svg") }}" class="glyphicon glyphicon-user img-rounded">

                    </div>
                    <div class="icon-name">平台用户</div>

                </div>
            </a>
            <a class="icon-view col-md-2" href="{{ URL::to('admin/moodle') }}" tip-title="Moodle课程：为Moodle平台的课程添加课程封面。">
                <div class="icon-wrapper">
                    <div class="icon-img">
                        <img src="{{ URL::asset("images/applist3.svg") }}" class="glyphicon glyphicon-user img-rounded">


                    </div>
                    <div class="icon-name">Moodle课程</div>

                </div>
            </a>
            <a class="icon-view col-md-2" href="{{ URL::to('admin/app') }}" tip-title="APP版本：提醒用户下载新的APP版本。">
                <div class="icon-wrapper">
                    <div class="icon-img">
                        <img src="{{ URL::asset("images/server.svg") }}" class="glyphicon glyphicon-user img-rounded">


                    </div>
                    <div class="icon-name">APP版本</div>

                </div>
            </a>

        </div>
    </div>

</div>


<script>
$('.icon-view').fadeIn(3000);
$(".icon-view").css("display", "block");
$(".icon-view").hover(function(){
    var title = $(this).attr("tip-title");
    $("#tip_title").text(title);
});
</script>