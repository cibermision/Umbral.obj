<?php
$images = glob('uploads/*.*');
foreach($images as $image) {
    echo '<img src="'.$image.'" alt="Foto" width="200">';
}
?>
