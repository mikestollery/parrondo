<?php

  require_once('PlanModel.php');
  require_once('BetRoul.php');

  final class DefaultModel extends PlanModel
  {
    public function run()
    {
      $this->message = 'ERROR: No Model defined for plan "' . $_REQUEST['p'] . '".';
      echo $this->message . '<br />';
    }
  }

?>