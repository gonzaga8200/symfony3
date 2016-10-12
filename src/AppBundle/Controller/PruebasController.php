<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Curso;

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

    public function createAction(){
        $curso = new Curso();
        $curso->setTitulo("Curso de Symfony3");
        $curso->setDescripcion("Curso completo de Symfony 3");
        $curso->setPrecio(80.2);

        $em = $this->getDoctrine()->getManager();
        $em->persist($curso);
        $flush=$em->flush();
        if ($flush){
            echo "fail";
        }else{
            echo "success";
        }
        die();
    }

    public function readAction(){
        $em = $this->getDoctrine()->getManager();
        $usuarios_repo = $em->getRepository("AppBundle:Usuario");
        $usuarios = $usuarios_repo->findAll();
        $usuarios2 = $usuarios_repo->findBy(array("name"=>"Bruce"));

        echo $usuarios2[0]->getName();

        die();

        return $this->render('AppBundle:Pruebas:read.html.twig',array(
            "usuarios"=>$usuarios
        ));
    }

    public function updateAction($id,  $titulo, $descripcion, $precio){
        $em = $this->getDoctrine()->getManager();
        $cursos_repo = $em->getRepository("AppBundle:Curso");

        echo $id." ".$titulo." ".$descripcion." ".$precio;

        $curso = $cursos_repo->find($id);
        $curso->setTitulo($titulo);
        $curso->setDescripcion($descripcion);
        $curso->setPrecio($precio);

        $em->persist($curso);
        $flush=$em->flush();
        if ($flush){
            echo "fail";
        }else{
            echo "success";
        }

        die();
    }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $curso_repo = $em->getRepository("AppBundle:Curso");
        $em->remove($curso_repo->find($id));
        $flush=$em->flush();

        if ($flush){
            echo "fail";
        }else{
            echo "success";
        }

        die();
    }

    public function nativeSqlAction(){
        $em = $this->getDoctrine()->getManager();
        /*$db = $em->getConnection();

        $query = "SELECT * FROM cursos";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);

        $cursos = $stmt->fetchAll();*/

        $query = $em->createQuery(
            "SELECT c FROM AppBundle:Curso c
              where c.precio > :precio"
        )->setParameter("precio","85");
        $cursos = $query->getResult();
        foreach($cursos as $curso){
            echo $curso->getTitulo()."<br>";
        }

        die();
    }
}
