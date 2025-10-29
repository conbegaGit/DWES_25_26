<?php
class persona
{
    private $DNI;
    private $nombre;
    private $apellido;

    function __construct($DNI, $nombre, $apellido)
    {
      $this -> DNI = $DNI;
      $this -> nombre = $nombre;
      $this -> apellido = $apellido;  
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "Persona: ".$this->nombre." ".$this->apellido." ".$this->DNI;
    }
}

class Clientes extends Persona
{
    private $saldo = 0;
    function __construct($DNI, $nombre, $apellido, $saldo)
    {
        parent::__construct($DNI, $nombre, $apellido);
        $this->$saldo = $saldo;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }
    public function __toString()
    {
        return "Cliente: ". $this->getNombre(). " ". $this->getApellido();
    }

}

//La parte de crear los objetos persona
$per = new Persona ("1111111A", "Ana", "Puertas");

echo $per. "<br>";

$per->setApellido("Montes");

echo $per. "<br>";

$cli = new Clientes("2222245A", "Pedro", "Sales", 100);
echo $cli."<br>";