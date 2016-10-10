<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PruebasController extends Controller
{
    public function indexAction(Request $request, $name, $page)
    {

        //return $this->redirect($this->generateUrl("mundo"));
        //return $this->redirect($this->container->get("router")->getContext()->getBaseUrl()."/mundo?hola=true");
        return $this->redirect($request->getBaseUrl()."/mundo?hola=true");

        // replace this example code with whatever you need
        return $this->render('AppBundle:Pruebas:index.html.twig', array(
            'texto' => $name."-".$page));
    }
}
