<?php

  require_once('PlanModel.php');

  final class HomeModel extends PlanModel
  {
    public $message;

    protected function run()
    {
      $this->message = 'hello world';
    }
  }

?>