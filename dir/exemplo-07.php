<?php

$filename = "images" . DIRECTORY_SEPARATOR . "brflow.png";

$base64 = base64_encode(file_get_contents($filename));
$fileinfo = new finfo(FILEINFO_MIME_TYPE);

$mimetype = $fileinfo->file($filename);

$base64encode = "data:" . $mimetype . "image/png;base64," . $base64;

?>

<a href="<?=$base64encode?>">Link para imagem</a>

<img src="<?=$base64encode?>" alt="imagem"></img>
