<?php 
class Persona {
    private $DNI;
    private $nombre;
    private $apellido;

    function __construct($DNI, $nombre, $apellido) {
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
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }   
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }   
    public function __toString() {
        return "Persona: ". $this ->nombre . " " . $this -> apellido;
}
}

    class Cliente extends Persona {
        private $saldo;
        
        function __construct($DNI, $nombre, $apellido, $saldo) {
            parent :: __construct ($DNI, $nombre, $apellido);
            $this->saldo = $saldo;
        }
        public function getSaldo() {
            return $this->saldo;
        }
        public function setSaldo($saldo) {
            $this->saldo = $saldo;
        }
        public function __toString()
        {
            return "Cliente: " . $this->getNombre();
        }
    }

// crear una persona 
    $per = new Persona("lllllllA", "Ana", "Puertas"); 
// mostrarla, usa el método _toString() 
   echo $per. "<br>"; 
// cambiar el apellido 
    $per->setApellido( "Montes");
//volver a mostrar 
    echo $per. "<br>";
//cliente 
    $cliente = new Cliente("12345678B", "Juan", "Vera", 2500);
    echo $cliente . "<br>";