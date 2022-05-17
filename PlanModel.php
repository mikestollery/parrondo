<?php

  require_once('Spin.php');

  abstract class PlanModel
  {
    protected $planName; // TODO: might not need this
    protected $numRounds; 
    protected $startStack; // capital at beginning of plan
    protected $currStack;  // current capital
    protected $startTime;
    protected $endTime;
    protected $spinLog = array(); // keep record of all spins played

    public function __construct()
    {
    }

    public function exec()
    {
      $this->startTime = microtime(true);
      $this->run();
      $this->endTime = microtime(true);
    }

    abstract protected function run();

    public function setName($planName)
    {
      $this->planName = $planName;
    }

    public function setStack($stack)
    {
      $this->startStack = $stack;
      $this->currStack = $stack;
    }

    public function setNumRounds($numRounds)
    {
      $this->numRounds = $numRounds;
    }

    public function className()
    {
      return get_class($this);
    }

    public function planType()
    {
      // e.g. PlanRoul001AModel ==> PlanRoul001A
      return preg_replace('/Model$/', '', get_class($this));
    }

    public function planName()
    {
      return $this->planName;
    }

    public function startStack()
    {
      return $this->startStack;
    }

    public function currStack()
    {
      return $this->currStack;
    }

    public function numRounds()
    {
      return $this->numRounds;
    }

    public function gain()
    {
      return $this->currStack - $this->startStack;
    }

    public function pcGain()
    {
      if ($this->startStack > 0)
      {
        return ($this->gain() / $this->startStack) * 100;
      }
      else // TODO: add some error handling
      {
        return '???';
      }
    }

    protected function play($spin)
    {
      $spin->setStack($this->currStack);
      $spin->play();
      $this->currStack = $spin->stack();

      $this->spinLog[] = $spin->logRecord();
    }

    public function startTime()
    {
      return $this->startTime;
    }

    public function endTime()
    {
      return $this->endTime;
    }

    public function execTime()
    {
      return $this->endTime - $this->startTime;
    }

    public function spinLog()
    {
      return $this->spinLog;
    }

    public function gradient()
    {
      if (($this->startStack > 0) && (count($this->spinLog) > 0))
      {
        return ($this->gain() / $this->startStack) / count($this->spinLog);
      }
      else // TODO: add some error handling
      {
        return '???';
      }
    }

    public function pcGradient()
    {
      return 100 * $this->gradient();
    }
  }

?>