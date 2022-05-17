<?php

  require_once('BetRoul.php');

  abstract class Spin
  {
    protected static $Count = 0;
    protected $number; // spin count
    protected $bet;
    protected $stack; // current capital
    protected $modulo;
    protected $result;
    protected $gain; // net gain

    public function __construct()
    {
      $this->result = -1;
      $this->gain = '';
    }

    public function setStack($stack)
    {
      $this->stack = $stack;
    }

    public function play($result = '')
    {
      $this->number = self::$Count++;

      $this->choose();      // choose bet in subclass
      $this->spin($result); // determine result subclass
      $this->collect();     // calculate gain in subclass

      $this->stack += $this->gain;
    }

    abstract protected function choose();

    abstract protected function spin($result = '');

    abstract protected function collect();

    // getters
    public function gain() 
    {
      return $this->gain;
    }

    public function number() 
    {
      return $this->number;
    }

    public function bet() 
    {
      return $this->bet;
    }

    public function result() 
    {
      return $this->result;
    }

    public function stack() // current capital
    {
      return $this->stack;
    }

    public function mod()
    {
      if ($this->modulo < 1)
      {
        // TODO: Improve error checking.
        //echo 'ERROR modulo="' . $this->modulo . '" in class ' . get_class($this) . '. Must be a positive integer.<br />';
        return '';
      }
      return $this->stack % $this->modulo;
    }

    public function prevStack() // before spin
    {
      return $this->stack - $this->gain;
    }

    public function logRecord()
    {
      return 'spin=[n=' . $this->number()
          . ' before=' . $this->prevStack()
          . ' mod=' . $this->mod()
          . ' ' . $this->bet->logRecord()
          . ' result=' . $this->result()
          . ' gain=' . $this->gain()
          . ' after=' . $this->stack()
          . ']';
    }
  }

?>