<?php

namespace Ptuit\PtuitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function indexAction($culture)
    {
        return $this->render('Ptuit:Main:index.html.twig');
    }
}
