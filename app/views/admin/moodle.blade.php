<div class="container">
    <div class="row headertitle" >
                <p>Moodle课程管理</p>
    </div>
    <div id="loading">
    	<div class="loading-length" style="width: 1903px;"></div>
    </div>
    <div class="row" style="height: 50px">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

        @endif
    </div>
    <div class="row" style="text-align: center;margin-bottom: 20px">
              {{ Form::open(array('url'=> 'admin/moodle', 'class'=> 'form-inline ')) }}
          <div class="form-group">
            <label for="exampleInputName2">Moodle平台</label>
            <select name="moodleid" class="form-control">
                @foreach($data['moodles'] as $moodle)
                <option value="{{ $moodle->id }}">{{ $moodle->moodlename }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail2">课程名称</label>
            <input type="text" name="coursename" class="form-control" id="exampleInputEmail2" placeholder="课程名称">
          </div>
          <button type="submit" class="btn btn-primary">查询课程</button>
            {{ Form::close() }}
    </div>


    <table class="table table-hover" >
      <thead style="text-align: center">
        <tr>
        <th>课程名称</th>
        <th>课程封面</th>
        <th>课程分类</th>
        <th>操作</th>
        </tr>
      </thead>
      <tbody>
      @foreach($data['courses'] as $course)
        <tr>
                <td>{{ $course->coursename }}</td>
                <td><img src="{{ empty($course->courseimage) ? URL::asset('images/course.svg') : URL::asset($course->courseimage) }}" alt="" class="img-rounded"></td>
                <td>{{ $course->subject }}</td>
                <td>
                        <a class="btn btn-danger">删除</a>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal_{{$course->id}}">
                          设置封面
                        </button>
                        <a class="btn btn-primary">设置电子资源</a>
                </td>
                <div class="modal fade" id="myModal_{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">设置课程封面</h4>
                      </div>
                      <form method="POST" accept-charset="UTF-8" action="course" enctype="multipart/form-data">

                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="modal-body" style="height: 150px">
                      <div class="row">
                         {{ FORM::label('课程名称',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                                <div class="col-md-8">
                                 {{ Form::label($course->coursename,null, array('class'=>'control-label ')) }}
                                 <input type="hidden" name="id" value="{{ $course->id }}">
                                </div>
                      </div>
                       <div class="row">
                       {{ FORM::label('设置封面',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                                       <div class="col-md-8">
                                       <input type="file" name="courseimage" class="form-control"/>
                                       </div>
                       </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        {{ Form::submit('保存',array('class'=>"btn btn-primary")) }}
                      </div>
                                          </form>

                    </div>
                  </div>
                </div>

        </tr>
        @endforeach
      </tbody>
    </table>
<!-- Button trigger modal -->

</div>
