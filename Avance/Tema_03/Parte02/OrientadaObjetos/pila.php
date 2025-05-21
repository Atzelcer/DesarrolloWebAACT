<?php
    class Pila {

        private $elementos = array();
        private $tope = 0;

        public function insertar($elementos): void{
            $this->elementos[$this->tope] = $elementos;
            $this->tope++;
        }


        public function eliminar(): void{
            $elementos=$this->elementos[$this->tope-1];
            $this->tope;
        }

        public function mostrar() : void{
            for($i=0; $i<$this->tope; $i++){
                echo $this->elementos[$i]."<br>";
            }
        }
    }

?>