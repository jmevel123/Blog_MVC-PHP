<?php

class AppController{

    public function loadModel($model)
    {

    }

    public function render($view = null)
    {
        require_once("../Views/" . $view . ".php");
    }

    public function beforeRender()
    {

    }

    protected function redirect($param)
    {

    }
}
