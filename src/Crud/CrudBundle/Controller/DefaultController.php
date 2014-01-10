<?php

namespace Crud\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrudCrudBundle:Default:index.html.twig');
    }
}
