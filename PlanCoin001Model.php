<?php

  require_once('PlanModel.php');
  require_once('SpinCoinA.php');
  require_once('SpinCoinB.php');
  require_once('BetCoin.php');

  final class PlanCoin001Model extends PlanModel
  {
    protected $spinA;
    protected $spinB;

    public function __construct()
    {
      parent::__construct();

      $capital = 303;
      $modulo  = 3;
      $epsilon = 0.005;

      $probA  = 0.50 - $epsilon;
      $probB1 = 0.10 - $epsilon;
      $probB2 = 0.75 - $epsilon;

      $stakeA  = 1;
      $stakeB1 = 1;
      $stakeB2 = 1;

      $betA = new BetCoin('A', $probA, $stakeA);

      $betB1 = new BetCoin('B1', $probB1, $stakeB1);

      $betB2 = new BetCoin('B2', $probB2, $stakeB2);

      $this->setStack($capital);
      $this->spinA = new SpinCoinA($betA);
      $this->spinB = new SpinCoinB($betB1, $betB2, $modulo);
    }

    protected function run()
    {
      // Spin sequence: AABBAABBAABB...

      for ($i = 0; $i < $this->numRounds; $i++)
      {
        $this->play($this->spinA);
        $this->play($this->spinA);
        $this->play($this->spinB);
        $this->play($this->spinB);
      }
    }
  }

?>