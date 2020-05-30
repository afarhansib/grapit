<?php

try {
	$json = file_get_contents('php://input');
	$fp = fopen('data.json', 'w');
	fwrite($fp, $json);
	fclose($fp);
	echo("berhasil!");
	// var_dump(json_decode($json));
} catch (Error $e) {
  echo "Error caught: " . $e->getMessage();
}

?>