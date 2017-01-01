<?php

  class Model{
    public $model;

    public function __construct(){
      $this->model = array();
    }

    public function add($key,$value){
      $this->model[$key] = $value;
    }
  }
?>