<?php

//upload.php

if(isset($_POST["image"]))
{
	$carpeta=$_POST["carpeta"];
	$data = $_POST["image"];


	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);


// $dir = opendir('storage/Imagen_Usuario/');
// while($f = readdir($dir))
// {
//
// if((time()-filemtime('storage/Imagen_Usuario/'.$f) > 36) and !(is_dir('tmp/'.$f)))
// unlink('storage/tmp/'.$f);
// }
// closedir($dir);
	$imageName = time() . '.png';
//	$imageName = 'cache.png';
file_put_contents('storage/'.$carpeta.'/'.$imageName, $data);


	echo   $imageName;

}

?>
