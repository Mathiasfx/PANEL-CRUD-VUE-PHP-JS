<?php
header('Access-Control-Allow-Origin: *');

session_start();
require 'php/Conexiones.php';
    //
    $result = array('error'=>false);
    $action = '';
    //Dependiendo de la Accion Obtenida va al metodo correspondiente.
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    //Metodo Leer de la Base de datos todos los productos y mandar en un array como JSON
    if ($action== 'leer') {
        $sql = $conn->query("SELECT * FROM `productos`");
        $productos = array();
        while($row = $sql->fetch_assoc()){
            array_push($productos,$row);
        }
        $result['productos'] = $productos;       
    }
    //Metodo Leer de la Base de datos todas las categorias
    if ($action== 'readCategory') {
        $sql = $conn->query("SELECT * FROM `categoria`");
        $categorias = array();
        while($row = $sql->fetch_assoc()){
            array_push($categorias,$row);
        }
        $result['categorias'] = $categorias;       
    }
    //Metodo Crear Nuevo Producto
    if ($action== 'create') {
        $Nombre = $_POST['Nombre'];
        $Descripcion = $_POST['Descripcion'];
        $Imagen = $_FILES['eImagen']['name']; 
        $Link = $_POST['Link'];
        $targert_dir = "productImages/";
        $target_file = $targert_dir.basename($Imagen);
        move_uploaded_file($_FILES['eImagen']['tmp_name'],$target_file);    
        $Categoria = $_POST['CategoriaID'];
		$Prefijo = $_POST['Prefijo'];
        $Precio = $_POST['Precio'];
        $sql = $conn->query("INSERT INTO `productos`(`NombreProducto`,`Descripcion`,`Imagen`,`Link`, `CategoriaID`, `Prefijo`, `Precio`) VALUES ('$Nombre', '$Descripcion','$Imagen','$Link','$Categoria','$Prefijo','$Precio')");
        if ($sql) {
            $result['message'] = "Producto Agregado Correctamente";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo agregar el producto, por favor comunicate con soporte" ;
        }    
    }
    //Metodo Crear Categoria
    if ($action== 'createCategoria') {
        $NombreCategoria = $_POST['NombreCategoria'];       
        $sql = $conn->query("INSERT INTO `categoria`(`CategoriaID`) VALUES ('$NombreCategoria')");
        if ($sql) {
            $result['message'] = "Categoria Agregado Correctamente";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo agregar la Categoria, por favor comunicate con soporte" ;
        }    
    }
    //Metodo Actualizar Producto
    if ($action== 'update') {
        $id = $_POST['idProductos'];
        $Nombre = $_POST['NombreProducto'];
        $Descripcion = $_POST['Descripcion'];       
        $Categoria = $_POST['CategoriaID'];
		$Prefijo = $_POST['Prefijo'];
        $Precio = $_POST['Precio'];
        $Imagen = "";
        $Link = $_POST['Link'];
        if (isset($_FILES['eImagen']['name'])):
            $Imagen = $_FILES['eImagen']['name'];
            $targert_dir="productImages/";
            $target_file=$targert_dir.basename($Imagen);
            move_uploaded_file($_FILES['eImagen']['tmp_name'],$target_file);    
            $Imagen= $_FILES['eImagen']['name'];
        endif;
        if ($Imagen != "") {
            $sql =  $conn->query("UPDATE productos SET NombreProducto= '$Nombre', Descripcion='$Descripcion',Imagen='$Imagen',Link='$Link' ,CategoriaID='$Categoria',Prefijo='$Prefijo', Precio= '$Precio' WHERE idProductos= '$id'");
        }
            $sql =  $conn->query("UPDATE productos SET NombreProducto= '$Nombre', Descripcion='$Descripcion',Link='$Link',CategoriaID='$Categoria',Prefijo='$Prefijo',Precio= '$Precio' WHERE idProductos= '$id'");
        //Mensaje de Proceso
        if ($sql) {
            $result['message'] = "Producto Actualizado Correctamente";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo Actualizar el producto, por favor comunicate con soporte" ;
        }    
    }
    //Metodo Eliminar
    if ($action== 'delete') {
        $id = $_POST['idProductos'];       
        $sql = $conn->query("DELETE FROM productos WHERE idProductos='$id'");
        if ($sql) {
            $result['message'] = "Producto Eliminado";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo Eliminar el producto, por favor comunicate con soporte" ;
        }    
    }
    //Cerrar Conexion
    $conn->close();
    //Enviar en Formato JSON
    echo json_encode($result);
