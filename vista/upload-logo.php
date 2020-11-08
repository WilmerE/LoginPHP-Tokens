<?php

include_once '../modelo/cambiar-logo.php';
$logo = new Logo($pdo);

$ruta = "../img/uploads/";
$archivo = $ruta . basename($_FILES["file"]["name"]);
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
// valida si es una imagen
$verificar_archivo = $_FILES["file"]["tmp_name"];
$info = getimagesize($verificar_archivo);

if($info != false){
    //Se restringe el tamaño del archivo
    $size = $_FILES["file"]["size"];
    if($size > 800000){
        echo "El archivo tiene que ser menor a 800kb";
    }else{
        //Validar el tipo de imagen
        if($tipoArchivo == "jpg" || $tipoArchivo == "webp" || $tipoArchivo == "svg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg"){
            //Se validó el archivo correctamente
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){

                if(isset($_FILES['file'])){
                    $logo->subir($archivo);
                }
                $correcto = "El archivo se subió correctamente";
                include_once 'subir-logo.php';
            }else{
                echo "Ocurrió un error al subir el el archivo";
            }
        }else{
            $correcto = "Solo se admiten archivos (jpg - webp - svg - png)";
            include_once 'subir-logo.php';
        }
    }
}else{
    echo "El documento no es una imagen";
    }
?>