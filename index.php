<?php
/*
    El index.php se el  FOUND CONTROLER que va manejar las rutas del controlador del sistema. 

    El index.php es el archivo principal de la aplicación que se va a encargar de manejar las 
    rutas de los controladores y las acciones que se van a ejecutar en la aplicación. El index.php va a recibir las peticiones por la url y va a determinar qué controlador y qué acción se van a ejecutar en la aplicación. capturandolas con el metodo $_GET.

    $_GET es una variable superglobal de PHP que se utiliza para recoger datos enviados por el método GET en formularios o por la URL. En este caso, se utiliza para recoger el controlador y la acción que se envían por la URL para determinar qué controlador y qué acción se van a ejecutar en la aplicación.
*/


/*
    require_once hace que un archivo se incluya y se evalúe en tiempo de ejecución. Es útil para incluir archivos que contienen funciones, variables y clases que se necesitan en tiempo de ejecución. En este caso se incluye el archivo de base de datos para que se pueda utilizar en cualquier parte del código.

    Archivo de base de datos lo van usar todos los modelos para conectarse a la base de datos que van a ser llamados por los controladores.

    require_once "modelos/basededatos.php"; realizar la conexion a la base de datos en el modelo que lo requiera y no en el archivo de base de datos

*/

require_once "modelos/basededatos.php";
//Incluye el archivo de base de datos para que se pueda utilizar en cualquier parte del código.

// Instanciar a un cotrolador para que llame a un controladore
if(!isset($_GET['c'])){ // En caso de que no se haya enviado un controlador por la url

    //El require_once es para incluir un archivo en el archivo actual (inicio.controlador.php)
    require_once "controladores/inicio.controlador.php";

    //instanciar un objeto de la clase InicioControlador
    $controlador = new InicioControlador();

    /*
        El call_user_func() es una función de PHP que se utiliza para llamar a una función definida por el usuario. En este caso, se utiliza llamar a un metodo de la clase InicioControlador (Inicio es el metodo que se va llamar en la clase InicioControlador) donde el objeto de la clase InicioControlador es $controlador
    */
    call_user_func(array($controlador, "Inicio")); 

}else{//En caso de que se haya enviado un controlador por la url

    $controlador = $_GET['c'];

    /*
        Incluye el controlador que se envio por la url, va tomar el nombre del controlador que se envio por la url y lo va concatenar con .controlador.php que es el nombre de los controladores que se encuentran en la carpeta controladores para incluir el controlador que se envio por la url. 
    */
    require_once "controladores/$controlador.controlador.php"; 

    //ucwords() convierte la primera letra de cada palabra a mayúsculas
    $controlador = ucwords($controlador)."Controlador"; 

    /*
        Esto se hace por que los nombres de las clases de los controladores empiezan con mayusculas en la misma estructura que los nombres de los archivos de los controladores, ejemplo: InicioControlador es el nombre de la clase y inicio.controlador.php es el nombre del archivo.
    */
    
    $controlador = new $controlador();//remplazando nombre de la variable en cada linea de codigo

    /*
        isset() determina si una variable está definida y no es NULL usandon un operador ternario para determinar si se envio una accion por la url o no y asignarle un valor por defecto en caso de que no se haya enviado una accion por la url.
    */
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    /*
        En caso de que no se haya enviado una accion por la url, se va a llamar al metodo Inicio de la clase que se instancio en la linea anterior, usando el metodo call_user_func().
    */

    call_user_func(array($controlador, $accion));
}
?>