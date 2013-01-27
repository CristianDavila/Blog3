<?php


    class vistasMotor extends coreView{

        public static function motor($plantilla, $valores){

            $url = './vistas/' . $plantilla . '.php';
            if(is_file($url)) require($url);
            else die('No existe esta plantilla');

        }


    }


?>
