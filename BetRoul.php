<?php

  final class BetRoul
  {
    private $name;
    private $places = array();

    public function __construct($name = '')
    {
      $this->name = $name;
      for ($i = 0; $i < 37; $i++)
      {
        $this->places[$i] = 0;
      }
    }

    public function place($loc, $amount)
    {
      $this->places[$loc] = $amount;
    }

    public function get($loc)
    {
      return $this->places[$loc];
    }

    public function name() // getter
    {
      return $this->name;
    }

    public function stake() // getter
    {
      $stake = 0;
      for ($i = 0; $i < 37; $i++)
      {
        $stake += $this->places[$i];
      }
      // TODO: add sides
      return $stake;
    }

    public function logRecord()
    {
      $log = 'bet=[name=' . $this->name
        . ' stake=' . $this->stake();

      for ($i = 0; $i < 37; $i++)
      {
        $amount = $this->get($i);
        if ($amount > 0)
        {
          $log .= ' p' . $i . '=' . $amount;
        }
      }

      $log .= ']';
      return $log;
    }
  }

?>