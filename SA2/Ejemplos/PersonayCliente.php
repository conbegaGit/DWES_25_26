<?php

class Persona {
    private $DNI;
    private $nombre;
    private $apellido;

    public function __construct($DNI, $nombre, $apellido) {
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function __tostring(){
        return "Persona " . $this ->nombre . " " . $this->apellido;
    }
}

class Cliente extends Persona {
    private $saldo = 0;
    function __construct($DNI, $nombre, $apellido, $saldo) {
        parent::__construct($DNI, $nombre, $apellido);
        $this->saldo = $saldo;
    }
    public function getSaldo() {
        return $this->saldo;
    }
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    public function __tostring(){
        return "Cliente " . $this ->getNombre();
    }
}

$cli = new Cliente("12345678A", "Pedro", "Sales", 100);
echo $cli;