<?php

session_start();
include_once 'php/Conexiones.php';
	
    
    $result = array('error'=>false);
    $action = '';

    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }

    if ($action== 'read') {
        $sql = $conn->query("SELECT * FROM productos");
        $productos = array();
        while($row = $sql->fetch_assoc()){
            array_push($productos,$row);
        }
        $result['productos'] = $productos;       
    }
    if ($action== 'readCategory') {
        $sql = $conn->query("SELECT * FROM categoria");
        $categorias = array();
        while($row = $sql->fetch_assoc()){
            array_push($categorias,$row);
        }
        $result['categorias'] = $categorias;       
    }
    if ($action== 'create') {
        $Nombre = $_POST['Nombre'];
        $Descripcion = $_POST['Descripcion'];
        $Imagen = $_FILES['Imagen']['name']; 
        $targert_dir = "productImages/";
        $target_file = $targert_dir.basename($Imagen);
        move_uploaded_file($_FILES['Imagen']['tmp_name'],$target_file);    
        $Categoria = $_POST['CategoriaID'];
		$Prefijo = $_POST['Prefijo'];
        $Precio = $_POST['Precio'];
        $sql = $conn->query("INSERT INTO `productos`(`NombreProducto`,`Descripcion`,`Imagen`, `CategoriaID`, `Prefijo`, `Precio`) VALUES ('$Nombre', '$Descripcion','$Imagen','$Categoria','$Prefijo','$Precio')");
        if ($sql) {
            $result['message'] = "Producto Agregado Correctamente";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo agregar el producto, por favor comunicate con soporte" ;
        }    
    }
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
    if ($action== 'update') {
        $id = $_POST['idProductos'];
        $Nombre = $_POST['NombreProducto'];
        $Descripcion = $_POST['Descripcion'];       
        $Categoria = $_POST['CategoriaID'];
		$Prefijo = $_POST['Prefijo'];
        $Precio = $_POST['Precio'];
        $Imagen = "";
        if (isset($_FILES['eImagen']['name'])):
            $Imagen = $_FILES['eImagen']['name'];
            $targert_dir="productImages/";
            $target_file=$targert_dir.basename($Imagen);
            move_uploaded_file($_FILES['eImagen']['tmp_name'],$target_file);    
            $Imagen= $_FILES['eImagen']['name'];
        endif;

        if ($Imagen != "") {
            $sql = $conn->query("UPDATE productos SET NombreProducto='$Nombre',Descripcion='$Descripcion', Imagen='$Imagen', CategoriaID='$Categoria', Prefijo='$Prefijo', Precio='$Precio' WHERE idProductos='$id'");
        }
             
        $sql = $conn->query("UPDATE productos SET NombreProducto='$Nombre',Descripcion='$Descripcion',  CategoriaID='$Categoria', Prefijo='$Prefijo', Precio='$Precio' WHERE idProductos='$id'");
        
        
        
        if ($sql) {
            $result['message'] = "Producto Actualizado Correctamente";
        }
        else
        {
            $result['error'] = true ;
            $result['message'] = "No se pudo Actualizar el producto, por favor comunicate con soporte" ;
        }    
    }

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
    $conn->close();
    echo json_encode($result);
?>
