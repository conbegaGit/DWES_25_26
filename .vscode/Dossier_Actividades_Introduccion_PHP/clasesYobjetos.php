<?php 

class producto{ 

        private static $contadorProductos=0; 

        public $nombre; 

        public $precio; 

    public function __construct($nombre, $precio){ 

        $this->nombre = $nombre; 

        $this->precio = $precio; 

        self::$contadorProductos++; 

    } 

    public static function obtenerTotalProductos (){ 

        return self::$contadorProductos; 

    } 

    public function __toString (){ 

        return"producto: {$this -> nombre} - Precio: {$this -> precio}€"; 

    } 

} 

$p1 = new producto ("Laptop", 1200.50); 

$p2 = new producto ("Raton", 25.99); 

$p3 = new producto ("teclado", 75.00); 

echo ($p1 . "<br>"); 

echo ($p2 . "<br>"); 

echo ($p3 . "<br>"); 

echo ("total de productos: " . producto::obtenerTotalProductos()); 

 