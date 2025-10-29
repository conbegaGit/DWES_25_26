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
        return "Producto: {$this->nombre} - Precio: {$this->precio}€";
    }
}

$p1 = new Producto("Laptop", 1200.50);
$p2 = new Producto("Ratón", 25.99);
$p3 = new Producto("Teclado", 75.00);

echo $p1 . "<br>";
echo $p3 . "<br><br>";

echo "Total de productos instanciados: " . Producto::obtenerTotalProductos();