<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/29
 * Time: 16:18
 */

class Moodle extends Eloquent {
    protected $table = 'moodle';

    public static $rules = array(
        'moodlename'=>'required|min:2',
        'moodleurl'=>'required|url',

    );
    public function getAllMoodle() {
        return $this->all();
    }
}