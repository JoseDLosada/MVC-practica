<?php 

class Producto{
    
    private $pdo;//Atributo para la conexión a la base de datos

    //Atributos de la tabla productos en la base de datos 
    private $pro_id;
    private $pro_nom;
    private $pro_mar;
    private $pro_cos;
    private $pro_pre;
    private $pro_can;
    private $pro_img;


    public function __construct(){
        try{
            $this->pdo = BasedeDatos::Conectar();//Conectar a la base de datos 
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function getPro_id() : ?int{
        //get es para obtener el valor de un atributo
        //Retornar el id del producto con los : ?int se indica que el valor retornado es un entero o nulo
        return $this->pro_id;
    }
    public function setPro_id(int $id){ //parametro de tipo entero.
        //set es para asignar un valor a un atributo
        //Asignar el id del producto
        $this->pro_id = $id;
    }
    public function getPro_nom() : ?string{
        //Retornar el nombre del producto
        return $this->pro_nom;
    }
    public function setPro_nom(string $nom){
        //Asignar el nombre del producto
        $this->pro_nom = $nom;
    }
    public function getPro_mar() : ?string{
        //Retornar la marca del producto
        return $this->pro_mar;
    }
    public function setPro_mar(string $mar){
        //Asignar la marca del producto
        $this->pro_mar = $mar;
    }
    public function getPro_cos() : ?float{
        //Retornar el costo del producto
        return $this->pro_cos;
    }
    public function setPro_cos(float $cos){
        //Asignar el costo del producto
        $this->pro_cos = $cos;
    }
    public function getPro_pre() : ?float{
        //Retornar el precio del producto
        return $this->pro_pre;
    }
    public function setPro_pre(float $pre){
        //Asignar el precio del producto
        $this->pro_pre = $pre;
    }
    public function getPro_can() : ?int{
        //Retornar la cantidad del producto
        return $this->pro_can;
    }
    public function setPro_can(int $can){
        //Asignar la cantidad del producto
        $this->pro_can = $can;
    }
    public function getPro_img() : ?string{
        //Retornar la imagen del producto
        return $this->pro_img;
    }
    public function setPro_img(string $img){
        //Asignar la imagen del producto
        $this->pro_img = $img;
    }   

    public function Cantidad(){
        try{
            //Realizar una consulta a la base de datos para obtener la cantidad de productos que hay en la tabla productos la ->prepare() se utiliza para preparar la consulta SQL que se va a ejecutar en la base de datos y se guarda en la variable $consulta la ->execute() se utiliza para ejecutar la consulta SQL que se preparó en la variable $consulta y se guarda en la variable $consulta->fetch(PDO::FETCH_COLUMN) se utiliza para obtener el resultado de la consulta SQL que se ejecutó en la base de datos.
            //El fetch se utiliza para obtener la siguiente fila de un conjunto de resultados de la base de datos y se guarda en la variable $consulta->fetch(PDO::FETCH_COLUMN) se utiliza para obtener el resultado de la consulta SQL que se ejecutó en la base de datos.
            $consulta = $this->pdo->prepare("SELECT SUM(pro_can) AS Cantidad FROM productos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_COLUMN);
        }catch(Exception $e){
            die($e->getMessage());//En caso de que se genere un error al intentar obtener la cantidad de productos, se imprime un mensaje de error en la pantalla con el metodo getMessage() que se utiliza para obtener el mensaje de error de la excepción. die se utiliza para terminar la ejecución del script.
        }
    }
    public function Listar(){
        try{
            //Realizar una consulta a la base de datos para obtener todos los productos que hay en la tabla productos la ->prepare() se utiliza para preparar la consulta SQL que se va a ejecutar en la base de datos y se guarda en la variable $consulta la ->execute() se utiliza para ejecutar la consulta SQL que se preparó en la variable $consulta y se guarda en la variable $consulta->fetchAll(PDO::FETCH_OBJ) se utiliza para obtener el resultado de la consulta SQL que se ejecutó en la base de datos.
            //fetchAll se utiliza para obtener todas las filas de un conjunto de resultados de la base de datos y se guarda en la variable $consulta->fetchAll(PDO::FETCH_OBJ) se utiliza para obtener el resultado de la consulta SQL que se ejecutó en la base de datos.
            $consulta = $this->pdo->prepare("SELECT * FROM productos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());//En caso de que se genere un error al intentar obtener los productos, se imprime un mensaje de error en la pantalla con el metodo getMessage() que se utiliza para obtener el mensaje de error de la excepción. die se utiliza para terminar la ejecución del script.
        }
    }

    public function Obtener($id){
        try{
            
            $consulta = $this->pdo->prepare("SELECT * FROM productos WHERE pro_id = ?;");
            $consulta->execute(array($id)); //Preparar la consulta SQL y ejecutarla en la base de datos con el id del producto que se quiere obtener y se guarda en la variable $consulta 
            $r = $consulta->fetch(PDO::FETCH_OBJ); //Obtener el resultado de la consulta SQL que se ejecutó en la base de datos y se guarda en la variable $r
            $p = new Producto(); // Crear una instancia de la clase Producto y se guarda en la variable $p 
            $p->setPro_id($r->pro_id); // Asignar el id del producto al atributo pro_id de la clase Producto con el metodo setPro_id() y se guarda en la variable $p
            $p->setPro_nom($r->pro_nom); 
            $p->setPro_mar($r->pro_mar); 
            $p->setPro_cos($r->pro_cos);
            $p->setPro_pre($r->pro_pre);
            $p->setPro_can($r->pro_can);

            return $p; //Retornar el producto con los datos obtenidos de la base de datos
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Insertar(Producto $p){ # Recive un objeto de tipo producto
        try{
            $consulta = "INSERT INTO productos(pro_nom, pro_mar, pro_cos, pro_pre, pro_can) VALUES (?, ?, ?, ?, ?);";//Consulta SQL para insertar un producto en la base de datos
            # se colocan interrogantes para evitar inyecciones SQL, los valores se pasan en un arreglo en el metodo execute
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $p->getPro_nom(), //Se obtiene el nombre del producto con el metodo getPro_nom() y se guarda en el arreglo que se pasa al metodo execute de la consulta SQL 
                            $p->getPro_mar(), 
                            $p->getPro_cos(), 
                            $p->getPro_pre(), 
                            $p->getPro_can()
                        ));//Preparar la consulta SQL y ejecutarla en la base de datos

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Producto $p){ # Recive un objeto de tipo producto
        try{
            $consulta = "UPDATE productos SET 
                    pro_nom = ?, 
                    pro_mar = ?, 
                    pro_cos = ?, 
                    pro_pre = ?, 
                    pro_can = ? 
                WHERE pro_id = ?;
            ";//Consulta SQL para actualizar un producto en la base de datos

            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $p->getPro_nom(), //Se obtiene el nombre del producto con el metodo getPro_nom() y se guarda en el arreglo que se pasa al metodo execute de la consulta SQL 
                            $p->getPro_mar(), 
                            $p->getPro_cos(), 
                            $p->getPro_pre(), 
                            $p->getPro_can(),
                            $p->getPro_id()
                        ));//Preparar la consulta SQL y ejecutarla en la base de datos

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){ # Recive un objeto de tipo producto
        try{
            $consulta = "DELETE FROM productos WHERE pro_id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

   
}