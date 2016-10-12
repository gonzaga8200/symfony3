<?php

namespace AppBundle\Twig;

class HelperVistas extends \Twig_Extension{
    public function getName(){
        return "app_bundle";
    }

    public function getFunctions(){
        return array(
          'generateTable' => new \Twig_Function_Method($this,'generateTable')
        );
    }

    public function generateTable($num_rows,$num_columns, $resultSet){
        $table="<table class='table'>";
        for($i=0; $i<count($resultSet); $i++){
            $table.="<tr>";
            for($j=0; $j<$num_columns; $j++){
                //$table.="<td>Fila ".$i." Columna ".$j."</td>";
                $table.="<td>".$resultSet[$i]["producto"]."</td>";
            }
            $table.="</tr>";
        }
        $table.="</table>";
        return $table;
    }
}