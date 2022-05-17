<?php

  require_once('Spin.php');

  abstract class SpinRoul extends Spin
  {
    protected function spin($result = '')
    {
      if ($result == '')
      {
        $this->result = rand(0, 36);
      }
      else // for testing
      {
        $this->result = $result;
      }
    }

    protected function collect()
    {
      $this->gain = 0;
      $this->gain += (36 * $this->bet->get($this->result));
      for ($i = 0; $i < 37; $i++)
      {
        $this->gain -= $this->bet->get($i);
      }
      // TODO: collect from sides too.
    }
  }

?>