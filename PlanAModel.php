<?php

  require_once('PlanModel.php');
  require_once('SpinRoulA.php');

  abstract class PlanAModel extends PlanModel
  {
    protected $spinA;

    public function __construct()
    {
      parent::__construct();
    }

    protected function run()
    {
      // Just one spin per round

      for ($i = 0; $i < $this->numRounds; $i++)
      {
        $this->play($this->spinA);
      }
    }
  }

?>