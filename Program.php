<?php

  class Program
  {
    private $planType;

    public function __construct()
    {
      if (! isset($_REQUEST['p']))
      {
        $this->planType = 'Home'; // draw home page
      }
      else
      {
        $this->planType = $_REQUEST['p'];
      }
    }

    public function main()
    {
      $modelClass = $this->getClass('Model');
      $controllerClass = $this->getClass('Controller');
      $viewClass = $this->getClass('View');

      if (0 == 0) // debug
      {
        echo 'modelClass=' . $modelClass . '<br />';
        echo 'controllerClass=' . $controllerClass . '<br />';
        echo 'viewClass=' . $viewClass . '<br />';
      }

      $model = new $modelClass();

      $controller = new $controllerClass($model);
      $controller->setupModel();

      $model->exec();

      $view = new $viewClass($model); // TODO: does the view need the controller?
      echo $view->display();
    }

    private function getClass($component)
    {
      if (file_exists($this->planType . $component . '.php'))
      {
        $planType = $this->planType;
      }
      else
      {
        $planType = 'Default';
      }

      require_once($planType . $component . '.php');
      return $planType . $component;
    }
  }

?>
