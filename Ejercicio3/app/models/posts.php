<?php

namespace app\models;

class posts extends Model {

    protected $table;
    protected $fillabel = [
        'user_Id',
        'title',
        'body'
    ];
    public $values = [];

    public function getAllPosts(){
        $result = $this->all()->get();
        return $result;
    }

}