<?php

namespace Flotz\Bundle\TxtLocalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FlotzTxtLocalBundle:Default:index.html.twig', array('name' => $name));
    }
}
