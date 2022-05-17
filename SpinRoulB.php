<?php

  require_once('SpinRoul.php');

  final class SpinRoulB extends SpinRoul
  {
    protected $betB1;
    protected $betB2;

    public function __construct($betB1, $betB2, $modulo)
    {
      parent::__construct();
      $this->betB1 = $betB1;
      $this->betB2 = $betB2;
      $this->modulo = $modulo;
    }

    protected function choose()
    {
      if ($this->mod() == 0)
      {
        $this->bet = $this->betB1;
      }
      else
      {
        $this->bet = $this->betB2;
      }
    }
  }

?>