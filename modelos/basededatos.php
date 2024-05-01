<?php
class BasedeDatos{

    /*
        Se crea una clase llamada BasedeDatos que va a contener los datos de la base de datos que se van a utilizar para la conexion a la base de datos. Los datos de la base de datos se van a guardar en constantes para que no se puedan modificar en tiempo de ejecución y se puedan utilizar en cualquier parte del código.
    */
    const servidor = "localhost:3307";
    const usuariobd = "root";
    const clave = "";
    const nombrebd = "practica_mvc";
    


    /*
        Metodo estatico que se va a utilizar para la conexion a la base de datos utilizando PDO (PHP Data Objects) que es una extensión de PHP que proporciona una capa de abstracción de acceso a datos, lo que significa que, independientemente del tipo de base de datos que se esté utilizando, se puede utilizar la misma funciones para realizar consultas y otras operaciones.

        Se crea un metodo estatico llamado Conectar() que se va a utilizar para realizar la conexion a la base de datos. Un metodo estatico se puede utilizar sin necesidad de instanciar un objeto de la clase, es decir, se puede utilizar directamente con el nombre de la clase y el metodo, en este caso, se puede utilizar con BasedeDatos::Conectar() sin necesidad de instanciar un objeto de la clase BasedeDatos.
    */

    public static function Conectar(){

        /*
            Se utiliza un bloque try...catch para capturar cualquier excepción que se genere al intentar la conexion a la base de datos. Un bloque try...catch se utiliza para manejar excepciones en PHP, es decir, se utiliza para capturar errores que se generen en el bloque try y manejarlos en el bloque catch.

            El bloque try se utiliza para envolver el código que se va a ejecutar y que puede generar una excepción. En caso de que se genere una excepción, se captura en el bloque catch y se maneja en el bloque catch.

            En este caso, se intenta realizar la conexion a la base de datos en el bloque try y en caso de que se genere una excepción, se captura en el bloque catch y se imprime un mensaje de error en la pantalla con el metodo getMessage() que se utiliza para obtener el mensaje de error de la excepción.    
        */

        try{
            /*
                Estrcutura de conexion es new PDO("mysql:host=nombre del servidor;dbname=nombre de la base de datos;charset=utf8", "usuario de la base de datos", "clave de la base de datos") que cada parte significa lo siguiente: mysql es el tipo de base de datos que se va a utilizar, host es el servidor donde se encuentra la base de datos, dbname es el nombre de la base de datos, charset=utf8 es el tipo de codificación que se va a utilizar para la base de datos, usuario de la base de datos es el usuario que se va a utilizar para conectarse a la base de datos y clave de la base de datos es la clave que se va a utilizar para conectarse a la base de datos.
            */
            $conexion = new PDO("mysql:host=".self::servidor.";dbname=".self::nombrebd.";charset=utf8", self::usuariobd, self::clave);

            /*
                Se utiliza el metodo setAttribute() para establecer un atributo en el objeto PDO que se acaba de instanciar, en este caso se establece el atributo PDO::ATTR_ERRMODE que se utiliza para establecer el modo de error de PDO, en este caso se establece el modo de error a PDO::ERRMODE_EXCEPTION que se utiliza para lanzar una excepción en caso de que ocurra un error en la base de datos
            */
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Se retorna la variable $conexion para que se pueda utilizar en cualquier parte del código.
            return $conexion;

        }catch(PDOException $e){
            //En caso de que se genere una excepción al intentar la conexion a la base de datos, se captura la excepción y se imprime un mensaje de error en la pantalla con el metodo getMessage() que se utiliza para obtener el mensaje de error de la excepción.
            return "Error al conectar a la base de datos: ".$e->getMessage();
            //Se utiliza la instrucción exit() para terminar la ejecución del script en caso de que se genere un error al intentar la conexion a la base de datos.
            exit();
        }
    }

}