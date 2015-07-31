<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'AdminController@showWelcome');
	|
	*/

    protected $layout = "layouts.admin";

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('auth', array('only'=>array('getIndex')));
        $this->beforeFilter('auth', array('except' => ''));
    }

   private  function curl_post($url, $post) {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $post,
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }



    public function getIndex()
	{
        $moodle = new Moodle();
        $moodles = $moodle->getAllMoodle();

        $this->layout->content = View::make('admin.index')->with('moodles',$moodles);
        //return View::make('hello');
	}

    public function postMoodleadd() {
        $validator = Validator::make(Input::all(), Moodle::$rules);

        if ($validator->passes()) {
            $moodle = new Moodle();//实例化User对象
            $moodle->moodlename = Input::get('moodlename');
            $moodle->moodleurl = Input::get('moodleurl');
            $moodle->isenable = Input::get('isenable');
            $moodle->save();
            $baseurl = $moodle->moodleurl."/webservice/rest/server.php?moodlewsrestformat=json&moodlewssettingfilter=true&wsfunction=core_course_get_courses&wstoken=50b22875390c83ea2f350fe011a99fd9";
            $data = $this->curl_post($baseurl , null);
            $resultarr = (array)json_decode($data);
            if(!empty($resultarr)) {
                foreach( $resultarr as $result) {
                    $course = new Course();

                    if(!Course::where(array('courseid'=> $result->id , 'moodleid' => $moodle->id))->count()) {

                        $course->courseid = $result->id;
                        $course->moodleid = $moodle->id;
                        $course->coursename = $result->fullname;
                        $course->courseimage = '';
                        $course->subject = $result->categoryid == '1' ? '其他' : '未定义';
                        $course->isdelete = $result->visible;
                        $course->save();
                    }

                }
            }
            //var_dump($resultarr);var_dump(empty($resultarr));die();


            return Redirect::to('admin/index')->with('message', empty($resultarr) ? '成功,此平台无课程':'添加成功，课程同步成功！');

        } else {
            return Redirect::to('admin/index')->with('message', '添加失败！');
        }
    }
    public function getUsers() {
        $this->layout->content = View::make('admin.users');
    }

    public function getMoodle() {
        $moodle = new Moodle();
        $data['moodles'] = $moodle->getAllMoodle();
        $course = new Course();
        $data['courses'] = $course->getCoursesByMoodle($data['moodles']->first()->id);
        $this->layout->content = View::make('admin.moodle')->with('data',$data);


    }

    public function postMoodle() {
        $moodle = new Moodle();
        $data['moodles'] = $moodle->getAllMoodle();
        $course = new Course();
        $data['courses'] = $course->getCoursesByMoodle($data['moodles']->first()->id);
        $this->layout->content = View::make('admin.moodle')->with('data',$data);
    }

    public function postCourse() {

        $rules = array(
            'courseimage' => 'image'
        );
        //var_dump($_FILES);die();
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
            $file = Input::file('courseimage');
            if($file->isValid()){
                $clientName = $file->getClientOriginalName();
                //$tmpName = $file->getFileName();
                //$realPath = $file->getRealPath();
                $extension = $file->getClientOriginalExtension();
                //$mimeTye = $file->getMimeType();
                $newName = md5(date('moodle').$clientName).".".$extension;
                $path = $file->move('uploads/images',$newName); //这里是缓存文件夹，存放的是用户上传的原图，这里要返回原图地址给
                $course = Course::find(Input::get('id'));
                $course->courseimage = $path->getPathname();
                $course->save();
                return Redirect::to('admin/moodle')->with('message', '上传成功！');

            }
        }else{
            return Redirect::to('admin/moodle')->with('message', '请上传图片！');

        }
    }
    public function getApp() {
        $this->layout->content = View::make('admin.app');

    }
}
