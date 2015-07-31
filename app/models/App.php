<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/29
 * Time: 16:18
 */

class App extends Eloquent {
    protected $table = 'apps';

    public function getALL() {
        return $this->all();
    }
}