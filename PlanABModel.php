<?php

  require_once('PlanModel.php');
  require_once('SpinRoulA.php');
  require_once('SpinRoulB.php');
  require_once('BetRoul.php');

  abstract class PlanABModel extends PlanModel
  {
    protected $spinA;
    protected $spinB;

    public function __construct()
    {
      parent::__construct();
    }

    protected function run()
    {
      // Each round has two spins

      for ($i = 0; $i < $this->numRounds; $i++)
      {
        $this->play($this->spinA);
        $this->play($this->spinB);
      }
    }
  }

?>