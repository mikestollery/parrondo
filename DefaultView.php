<?php
  require_once('PlanView.php');

  final class DefaultView extends PlanView
  {
    public function displayPlan()
    {
      $display = '<pre>'
        . $this->displaySummary();

      // TODO: maybe replace this condition with a parameterised value
      if (count($this->model->spinLog()) <= 100)
      {
        $display .= $this->displaySpins();
      }

      $display .= '</pre>';

      return $display;
    }

    public function displaySummary()
    {
      $display = ''
        . ' Plan: "' . $this->model->planType() . '"'
        . ' Name: "' . $this->model->planName() . '"'
        . ' Rounds: ' . $this->model->numRounds()
        . ' Spins: ' . count($this->model->spinLog()) . '<br />'
        . 'Stack: start=' . $this->model->startStack() 
        . ' end=' . $this->model->currStack()
        . ' gain=' . $this->model->gain()
        . ' pcGain=' . $this->model->pcGain() . '%'
        . ' gradient=' . $this->model->gradient()
        . ' pcGradient=' . $this->model->pcGradient() . '%'
        . '<br />'
        . ' Time: ' . $this->model->execTime() . ' seconds'
//        . ' start=' . $this->model->startTime() 
//        . ' end=' . $this->model->endTime()
        . '<br />';
      return $display;
    }

    public function displaySpins()
    {
      $display = '';

      foreach($this->model->spinLog() as $log)
      {
        $display .= $log . '<br />';
      }

      return $display;
    }
  }

?> 