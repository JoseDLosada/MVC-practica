<?php

require_once "modelos/producto.php";

class InicioControlador{

    //Metodo que se va a utilizar para mostrar la vista de inicio de la aplicación que se encuentra en la carpeta vistas/inicio.php y se va a utilizar para mostrar la vista de inicio de la aplicación. 

    private $modelo;


    public function __construct(){
        $this->modelo = new Producto();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }




}