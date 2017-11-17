<?php

namespace App\Controllers;

use miqueias\Controller\Action;
use miqueias\DI\Container;

class IndexController extends Action
{
    public function __construct()
    {
        $this->views = new \stdClass();
    }

    public function index()
    {
        $clients = Container::getModel('Client');
        $this->views->clients = $clients->get();
        $this->render('index');
    }

    public function  contact()
    {
        $clients = Container::getModel('Client');
        $this->views->clients = $clients->find(2);
        $this->render('contact');
    }
}