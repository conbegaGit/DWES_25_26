<?php
    /*
    Tareas: Crea una clase llamada Producto que represente un artículo en un inventario. 

        Define una propiedad estática privada llamada contadorProductos e inicialízala a 0. 

        Define dos propiedades públicas de instancia: nombre y precio. 

        Define el constructor de la clase (__construct). Este debe: 

        Recibir los parámetros $nombre y $precio. 

        Asignar los valores a las propiedades del objeto ($this->nombre, $this->precio). 

        Incrementar el valor de la propiedad estática contadorProductos para registrar el nuevo producto. 

        Define un método público estático llamado obtenerTotalProductos() que devuelva el valor de contadorProductos. 

        Define el método mágico __toString() que devuelva una cadena con el siguiente formato: "Producto: [nombre] - Precio: [precio]€". 

        Instancia tres objetos de la clase Producto: 

        $p1 = "Laptop", 1200.50 

        $p2 = "Ratón", 25.99 

        $p3 = "Teclado", 75.00 

        Muestra en pantalla la información de los objetos $p1 y $p3 usando echo (esto probará la función __toString()). 

        Muestra el número total de productos instanciados utilizando la función estática obtenerTotalProductos(). 
    */

        class Producto {
            public $nombre;
            public $precio;

            private static $contadorProductos = 0;

            function __construct($nombre, $precio)
            {
            $this->nombre = $nombre;
            $this->precio =$precio;

            self::$contadorProductos++;
            }

            public static function obtenerTotalProductos() 
            {
                return self::$contadorProductos;
            }

            public function __toString() 
            {
                return "Producto: {$this->nombre} - Precio: {$this->precio}€";
            }
        }

        $p1 = new Producto("Laptop", 1200.50);
        $p2 = new Producto("Ratón", 25.99);
        $p3 = new Producto("Teclado", 75.00);

        echo "Informacion de los objetos p1 y p3: <br>";
        echo $p1 . "<br>";
        echo $p3 . "<br>";

        echo "Total de productos: " . Producto::obtenerTotalProductos();