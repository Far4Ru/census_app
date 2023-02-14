<?php

namespace App\Controller;

use App\Controller\AppController;

class CitizensController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel("Citizens");
        // Created app.php file inside /templates/layout/app.php
        $this->viewBuilder()->setLayout("app");
    }

    public function census()
    {
        $citizens = $this->Citizens->find()->toList();
        $this->set("title", "List Citizens");
        $this->set(compact("citizens"));
    }
}
