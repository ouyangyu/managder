<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/29
 * Time: 16:18
 */

class Course extends Eloquent {
    protected $table = 'courses';

    public function getCoursesByMoodle($moodleid) {

        return $this->where('moodleid','=',$moodleid)->get();
    }
}