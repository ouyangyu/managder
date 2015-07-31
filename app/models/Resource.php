<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/29
 * Time: 16:18
 */

class Resource extends Eloquent {
    protected $table = 'resources';

    public function getResoursByCourse($courseid) {
        return $this->where('courseid','=',$courseid);
    }
}