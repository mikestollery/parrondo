<?php

  require_once('PlanAModel.php');

  final class PlanRoul001Model extends PlanAModel
  {
    public function __construct()
    {
      parent::__construct();

      $capital = 3030;
//      $modulo  = 5; // Not needed for a type A plan.

      $betA = new BetRoul('A');

      $betA->place(1, 10);
      $betA->place(2, 11);
      $betA->place(3, 11);

      $this->setStack($capital);
      $this->spinA = new SpinRoulA($betA);
    }
  }

?>