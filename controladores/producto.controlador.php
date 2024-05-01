<?php

require_once "modelos/producto.php";


class ProductoControlador{

    private $modelo;

    public function __construct(){
        $this->modelo = new Producto();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/productos/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar Producto";
        $p = new Producto();
        if(isset($_GET['id'])){
            $p = $this->modelo->Obtener($_GET['id']);
            $titulo="Editar Producto";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/productos/form.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $p = new Producto(); #Instancia de la clase Producto 
        $p -> setPro_id(intval($_POST['ID'])); # setPro_id es un metodo de la clase Producto que asigna el valor de $_POST['ID'] al atributo pro_id
        $p -> setPro_nom($_POST['Nombre']);
        $p -> setPro_mar($_POST['Marca']);
        $p -> setPro_cos($_POST['Costo']);
        $p -> setPro_pre($_POST['Precio']);
        $p -> setPro_can($_POST['Cantidad']);

        $p->getPro_id() > 0 ? $this->modelo->Actualizar($p) : $this->modelo->Insertar($p); //Si el id del producto es mayor a 0, actualizar el producto p, de lo contrario insertar el producto p
        header("location:?c=producto"); #Redireccionar a la lista de productos 
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET['id']); #Borrar el producto con el id que se recibe por GET
        header("location:?c=producto"); #Redireccionar a la lista de productos
    }

}