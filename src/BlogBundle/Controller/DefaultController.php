<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entry_repos = $em->getRepository("BlogBundle:Entry");
        $entries = $entry_repos->findAll();
        foreach ($entries as $entry){
            echo $entry->getTitle()."<br>";
            echo $entry->getCategory()->getName()."<br>";
            echo $entry->getUser()->getName()."<br><hr>";

            $tags = $entry->getEntryTag();
            foreach($tags as $tag){
                echo $tag->getTag()->getName().", ";
            }
        }

        die();
        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
