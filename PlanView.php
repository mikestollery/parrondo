<?php

//  require_once('View.php');

  abstract class PlanView 
  {
    protected $model;

    public function __construct($model)
    {
      $this->model = $model;
    }

    public function model()
    {
      return $this->model;
    }

    public function display()
    {
      return $this->displayPlan() . $this->displayForm();
    }

    public function displayForm()
    {
      $numRounds = $this->model()->numRounds();

      $display = <<<EOF

      <fieldset>
       <legend>Plan</legend>
       <form method="post" action="">
        <div class="text">
         <label for="r">Rounds</label>
         <input type="text" name="r" value="$numRounds" size="6" maxlength="6" />
        </div>
        <div class="select">
         <label for="p">Plan</label>
         <select name="p">
EOF;

      foreach (glob("Plan*Model.php") as $fname)
      {
        $plan = preg_replace('/Model.php$/', '', $fname);
        if (strlen($plan) > 6) // prevent PlanA, PlanAB etc from being included
        {
          $display .= '<option value="' . $plan . '"';
          if ($plan == $this->model()->planType())
          {
            $display .= ' selected="SELECTED"';
          }
          $display .= '>' . $plan . '</option>';
        }
      }

      $display .= <<<EOF
         </select>
        </div>
        <div class="submit">
         <input type="submit" name="submit" value="Submit" />
        </div>
       </form>
      </fieldset>
EOF;

      return $display;
    }
  }

?> 