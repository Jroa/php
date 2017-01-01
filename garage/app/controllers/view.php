<?php
  class View{
    private $page;
    private $model;

    public function __construct($page, $model){
      $this->page = $page;
      $this->model = $model;
    }

    public function render(){

      //page content
      extract($this->model->model);
      $pageContent = "views/". $this->page;

      include("views/structure/page.php");
      //include("views/". $this->page);
    }
  }

?>