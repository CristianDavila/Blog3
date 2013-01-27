<?php



    class articlesModel{

        protected $db;

        public function __construct()
        {
                //Traemos la unica instancia de PDO
                $this->db = coreModel::singleton();

                $cont = $this -> db -> prepare("SET NAMES 'utf8'");
                $cont->execute();
        }



        public function articulos($limit){


            $consulta = $this->db->prepare("SELECT * FROM articulos ORDER BY id DESC LIMIT $limit, 10");

            // Obtenemos noticias

            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);


        }

        public function mostrarArticulo($titulo){

            // Obtenemos la noticia
            $consulta = $this->db->prepare('SELECT * FROM articulos WHERE titulo= ?');
            $consulta->execute(array($titulo)); //evitamos SQL injection de esta forma

            return $consulta->fetch();

        }




        public function regArticulo($valores){
            $contenido = $valores[0];
            $titulo = $valores[1];
            $resumen = $valores[2];
            $consulta = $this->db->prepare('SELECT * FROM articulos WHERE titulo= ?');
            $consulta->execute(array($titulo));
            $ey= $consulta->fetch();
            $fecha = date("j-n-Y");
            if($ey != 0){
                header( 'Location: panel.php' );
                exit();
            }
            else {
                $inserta = $this->db->prepare('INSERT INTO articulos (titulo, contenido, resumen, fecha) VALUES (?, ?, ?, ?)');
                $inserta->execute(array($titulo, $contenido, $resumen, $fecha) );
            }

        }
        public function actArticulo($valores){
            $contenido = $valores[0];
            $titulo = $valores[1];
            $resumen = $valores[2];
            $id = $valores[3];

            $inserta = $this->db->prepare("UPDATE articulos SET titulo = :titulo, contenido = :contenido, resumen = :resumen WHERE id = :id");
            $inserta->execute(array(':titulo' => $titulo, ':contenido' => $contenido, ':resumen' => $resumen, ':id' => $id) );

        }



        public function paginacionConexion(){


            $consulta = $this->db->prepare('SELECT * FROM articulos ORDER BY id DESC LIMIT 1');
            $consulta->execute();
            $id = $consulta->fetch();

            return ceil($id['id']/10);


        }
    }

?>
