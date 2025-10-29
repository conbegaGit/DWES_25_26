<?php
    //CLASE PERSONA: SINTAXIS DE CREACION Y DE FUNCIONES
    class Persona{
        private $nombre;
        private $apellido;
        private $DNI;

        function __construct($DNI, $nombre, $apellido)
        {
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

        public function __toString()
        {
            return "Persona: " . $this->nombre . " " . $this->apellido;
        }
    }

    //Crear una persona
    $per = new Persona("1111111", 'Rauuul', 'Millonario');
    echo $per . '<br>';
    $per->setApellido("Embriones");
    echo $per .  '<br>';

    //CLASE CLIENTE QUE ES HERENCIA DE PERSONA: SINTAXIS CON SUS FUNCIONES
    Class Cliente extends Persona{
        private $saldo = 0;

        function __construct($DNI, $nombre, $apellido, $saldo)
        {
            parent::__construct($DNI, $nombre, $apellido);
            $this->saldo = $saldo;
        }

        public function getSaldo(){
            return $this->saldo;
        }

        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }

        public function __toString()
        {
            return "Cliente: " . $this->getNombre();
        }
    }

    $cli = new Cliente("11111125A", "Ceben", "Trivone", 200);
    //Muestra al objeto de la clase Cliente.
    echo $cli . '<br>';