<?php

$link = 'https://www.torredevigilancia.com/wp-content/uploads/2019/11/deep-smash-link-zelda-moves-10.jpg';

$content = file_get_contents($link);

$parse = parse_url($link);

$basename = basename($parse["path"]);

$image = fopen($basename, "w+");
fwrite($image, $content);
fclose($image);


?>