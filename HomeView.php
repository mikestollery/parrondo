<?php
  require_once('PlanView.php');

  final class HomeView extends PlanView
  {
    public function displayPlan()
    {
      $display = '<pre>'
        . $this->model->message
        . '</pre>';
    }
  }

?> 