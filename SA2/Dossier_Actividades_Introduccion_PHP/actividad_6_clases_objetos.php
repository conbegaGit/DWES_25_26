<?php
    //tarea 1 propiedad privada
    class Producto {
        private static $contadorProductos = 0;
        //tarea 2 propiedades publicas
        public $nombre;
        public $precio;
        //tarea 3 constructor
        public function __construct($nombre, $precio) {
            $this->nombre = $nombre;
            $this->precio = $precio;
            self::$contadorProductos++;
        }

        //tarea 4 metodo publico estatico
        public static function obtenerTotalProductos() {
            return self::$contadorProductos;
        }

        //tarea 5 metodo magico
        public function __toString() {
            return "Producto: {$this->nombre} - Precio: {$this->precio}€";
        }
    }

    //tarea 6 instanciar tres objetos
    $p1 = new Producto("Laptop", 1200.50);
    $p2 = new Producto("Ratón", 25.99);
    $p3 = new Producto("Teclado", 75.00);

    //tarea 7 mostrar por pantalla
    echo "--Información de productos (tarea 7)-- <br>";
    echo $p1 . "<br>";
    echo $p3 . "<br><br>";

    //tarea 8 mostrar total
    echo "Número total de productos creados: " . Producto::obtenerTotalProductos();