<?php

  require_once('PlanABModel.php');

  final class PlanRoul002Model extends PlanABModel
  {
    public function __construct()
    {
      parent::__construct();

      $capital = 3030;
      $modulo  = 5;

      $betA = new BetRoul('A');
      $betA->place(1, 10);
      $betA->place(2, 11);
      $betA->place(3, 12);

      $betB1 = new BetRoul('B1');
      $betB1->place(4, 20);
      $betB1->place(5, 21);
      $betB1->place(6, 22);

      $betB2 = new BetRoul('B2');
      $betB2->place(7, 20);
      $betB2->place(8, 21);
      $betB2->place(9, 23);

      $this->setStack($capital);
      $this->spinA = new SpinRoulA($betA);
      $this->spinB = new SpinRoulB($betB1, $betB2, $modulo);
    }
  }

?>