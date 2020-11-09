<?php

$file = fopen("teste.txt", "w+");

fclose($file);

unlink("teste.txt");

foreach (scandir("images") as $item) {
	if (!in_array($item, array(".", ".."))) {
		unlink("images/" . $item);
	};
};

echo "OK";

?>
