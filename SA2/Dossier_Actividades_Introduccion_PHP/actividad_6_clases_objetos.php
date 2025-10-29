<?php

class Producto {
    private static $contadorProductos = 0;
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        self::$contadorProductos++;
    }

    public static function obtenerTotalProductos() {
        return self::$contadorProductos;
    }

    public function __toString() {
        return "Producto: " . $this->nombre . " - Precio: " . number_format($this->precio, 2) . "€";
    }
}

$p1 = new Producto("Ordenador portátil", 1200.50);
$p2 = new Producto("Ratón", 25.99);
$p3 = new Producto("Teclado", 75.00);

echo $p1 . "<br>";
echo $p3 . "<br>";
echo "Total de productos: " . Producto::obtenerTotalProductos();
