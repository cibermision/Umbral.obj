
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Verificar si la foto es una imagen válida
    if (isset($_FILES["foto"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            echo "El archivo es una imagen - ¡Bien hecho!.";
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }
    // Si todo está bien, proceder a subir la imagen
    if ($uploadOk == 0) {
        echo "Lo siento, su archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "La foto ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " ha sido subida.";
        } else {
            echo "Ha ocurrido un error al subir la foto.";
        }
    }
}
?>
