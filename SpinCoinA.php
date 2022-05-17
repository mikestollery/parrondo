<?php

  require_once('SpinCoin.php');

  final class SpinCoinA extends SpinCoin
  {
    protected $betA;

    public function __construct($betA)
    {
      parent::__construct();
      $this->betA = $betA;
      // don't need to set modulo for a type A spin
    }

    public function choose()
    {
      $this->bet = $this->betA;
    }
  }

?>