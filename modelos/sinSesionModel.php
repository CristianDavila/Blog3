<?php

    class sinSesionModel{

        protected $db;

        public function __construct()
        {
                //Traemos la unica instancia de PDO
                $this->db = coreModel::singleton();

                $cont = $this -> db -> prepare("SET NAMES 'utf8'");
                $cont->execute();
        }




        public function validar($user, $password){

            $usuario= $_POST['usuario'];
            $pass= $_POST['password'];

            $rec = $this->db->prepare("SELECT * FROM users WHERE user=? && pass=?");
            $rec->execute(array($usuario,$pass));
            $user = $rec->fetch();
            if(! empty($user)){

                $root = $user['root'];
                $key=array("SI",$root);

            }

            else $key=array("NO","NO");

            return $key;
        }
    }
?>
