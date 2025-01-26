<?php

namespace app\controllers;

use core\View;

class HomeController 
{
    public function index()
    {
        View::render('home');
    }
}
