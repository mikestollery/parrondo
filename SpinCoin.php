<?php

  require_once('Spin.php');

  abstract class SpinCoin extends Spin
  {
    protected function spin($result = '')
    {
      if ($result == '')
      {
        // result is a float between 0 and 1
        $this->result = rand() / getrandmax();
      }
      else // for testing
      {
        $this->result = $result;
      }
    }

    protected function collect()
    {
      if ($this->result < $this->bet->prob())
      {
        $this->gain = $this->bet->stake(); // win
      }
      else
      {
        $this->gain = 0 - $this->bet->stake(); // lose
      }
    }
  }

?>