<?php
    class persona{
        private $DNI;
        private $nombre;
        private $apellido;

        function __construct($DNI, $nombre, $apellido){
            $this->DNI = $DNI;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function __toString(){
        return "Persona: " . $this->nombre."". $this->apellido;
    }

    }

    class Cliente extends Persona{
        private $Saldo = 0;

        function __construct($DNI, $nombre, $apellido, $Saldo){
            parent::__construct($DNI, $nombre, $apellido);
            $this->$Saldo = $Saldo;
        }
        public function getSaldo(){
            return $this->Saldo;
        }
        public function setSaldo($Saldo){
            $this->Saldo = $Saldo;
        }
        public function __toString(){
            return "Cliente: " . $this->getNombre();
        }
    }

    //crear una persona
    $per = new Persona("111111A", "Ana ", " Puertas");
    //mostrarla, usa el método __toString()
    echo $per. "<br>";
    //cambiar el apellido
    $per->setApellido("Montes");
    $cli = new Cliente("22222245A", "Pedro", "Sales", 100);
    echo $cli. "<br>";