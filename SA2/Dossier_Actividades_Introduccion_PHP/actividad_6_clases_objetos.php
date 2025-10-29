<?php

    echo "Actividad_6 - Clases y objetos. <br> <br>";

    class Producto{ 
        public static $contadorProductos = 0; 
        public $nombre; 
        public $precio; 

        public function __construct($nombre, $precio) 
        { 
            $this->nombre = $nombre; 
            $this->precio = $precio; 
            self::$contadorProductos ++;
        } 

        public static function obtenerTotalProductos(){ 
            return self::$contadorProductos; 
        } 

        public function __toString() 
        { 
            return "Producto: {$this->nombre} - Precio: {$this->precio}"; 
        } 
    } 

    $p1 = new Producto("Lapto", 1200.50); 
    $p2 = new Producto("Ratón", 25.99); 
    $p3 = new Producto("Teclado", 75.00); 

    echo "Objeto: " . $p1->__toString() . '<br>'; 
    echo "Objeto: " . $p3->__toString() . '<br>'; 
    echo "El número total de productos instanciados son: " . Producto::obtenerTotalProductos(); 