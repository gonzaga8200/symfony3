<?php
/**
 * Created by PhpStorm.
 * User: gonzalomorenominguito
 * Date: 12/10/16
 * Time: 17:30
 */

namespace AppBundle\Twig;


class FilterVista extends \Twig_Extension{

    public function getFilters(){
        return array(
            new \Twig_SimpleFilter("addText", array($this,'addText'))
        );
    }

    public function addText($string, $num){
        return $string." Texto concatenado ".$num;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return "filter_vista";
    }
}
{

}