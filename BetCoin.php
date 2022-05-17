<?php


  final class BetCoin
  {
    private $name;
    private $prob;
    private $stake;

    public function __construct($name, $prob, $stake)
    {
      $this->name = $name;
      $this->prob = $prob;
      $this->stake = $stake;
    }

    public function name()
    {
      return $this->name;
    }

    public function prob()
    {
      return $this->prob;
    }

    public function stake() 
    {
      return $this->stake;
    }

    public function logRecord()
    {
      return 'bet=[name=' . $this->name()
               . ' prob=' . $this->prob()
               . ' stake=' . $this->stake()
               . ']';
    }
  }

?>