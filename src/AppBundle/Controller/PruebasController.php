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
        //var_dump($request->query->get("hola"));
        //var_dump($request->get('hola-post'));
        //die();
        //return $this->redirect($request->getBaseUrl()."/mundo?hola=true");


        $productos = array(array("producto"=>"Play Station", "precio"=>399),
                           array("producto"=>"Xbox", "precio"=>499),
                            array("producto"=>"Iphone7", "precio"=>899),
                            array("producto"=>"Mac book Pro Retina", "precio"=>1500),
                            array("producto"=>"Biicleta", "precio"=>1299));

        $fruta = array("manzana"=>"golden", "pera"=>"conferencia");

        // replace this example code with whatever you need
        return $this->render('AppBundle:Pruebas:index.html.twig', array(
            'texto' => $name."-".$page,
            'productos'=> $productos,
            'fruta'=>$fruta
        ));
    }
}
