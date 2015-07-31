<div class="container">
    <div class="row headertitle" >
                <p>Moodle平台管理</p>
    </div>
    <div id="loading">
    	<div class="loading-length" style="width: 1903px;"></div>
    </div>
    <div class="row" style="height: 50px">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

        @endif
    </div>

    <table class="table table-hover" >
      <thead style="text-align: center">
        <tr>
        <th>平台名称</th>
        <th>平台地址</th>
        <th>是否显示</th>
        <th>操作</th>
        </tr>
      </thead>
      <tbody>
      @foreach($moodles as $moodle)
        <tr>
                <td>{{ $moodle->moodlename }}</td>
                <td>{{ $moodle->moodleurl }}</td>
                <td><span>{{ $moodle->isenable == 1 ? '显示' : '不显示' }}</span></td>
                <td>
                        <a class="btn btn-danger">删除</a><a class="btn btn-primary">更新课程</a>
                </td>
        </tr>
        @endforeach
      </tbody>
    </table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  新增Moodle平台
</button>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">新增Moodle平台</h4>
      </div>
      {{ Form::open(array('url'=> 'admin/moodleadd', 'class'=> 'form-horizontal ')) }}
      <div class="modal-body" style="height: 200px">
      <div class="row">
         {{ FORM::label('平台名称',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                <div class="col-md-8">
                 {{ Form::text('moodlename',null, array('class'=>'form-control ', 'id'=>'inputmoodlename', 'placeholder'=>'平台名称')) }}

                </div>
      </div>
       <div class="row">
       {{ FORM::label('平台地址',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                       <div class="col-md-8">
                        {{ Form::text('moodleurl',null, array('class'=>'form-control ', 'id'=>'inputmoodleurl', 'placeholder'=>'平台地址')) }}

                       </div>
       </div>
        <div class="row">
               {{ FORM::label('是否显示',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
            <div class="col-md-8">
                {{ Form::select('isenable',array('1'=>'显示','0'=>'不显示'),null ,array('class'=>'form-control')) }}
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        {{ Form::submit('保存',array('class'=>"btn btn-primary")) }}
      </div>
    </div>
  </div>
</div>