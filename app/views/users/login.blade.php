<div class="row" style="text-align: center">
        <p><h3>登录</h3></p>
        {{ Form::open(array('url' => 'users/signin', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                <label for="inputEmail3" class="col-md-offset-3 col-md-1 control-label">用户名</label>
                <div class="col-sm-4">
			    	  	 {{ Form::text('email', null, array('class'=>'form-control', 'id'=>'inputEmail3', 'placeholder'=>'邮箱')) }}

                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-md-offset-3 col-md-1 control-label">密码</label>
                <div class="col-sm-4 ">
                    {{--<input type="password" class="form-control" id="inputPassword3" placeholder="密码">--}}
                     {{ Form::password('password',array('class'=>'form-control','id'=>'inputPassword3','placeholder'=>'密码')) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">

                    {{ Form::submit('登录', array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        {{ Form::close() }}

    </div>