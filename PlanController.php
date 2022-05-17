<?php

//  require_once('Controller.php');
  require_once('PlanModel.php');

  abstract class PlanController
  {
    protected $model;

    public function __construct($model)
    {
      $this->model = $model;
    }

    public function setupModel() // using cgi params
    {
      // plan name
      if (isset($_REQUEST['n']))
      {
        $this->model->setName($_REQUEST['n']);
      }

      // number of rounds
      if (isset($_REQUEST['r']))
      {
        $this->model->setNumRounds($_REQUEST['r']);
      }
      else
      {
        $this->model->setNumRounds(10);
      }
    }
  }

?> 