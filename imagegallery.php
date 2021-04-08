<?php
	$x = 1;
    $files = scandir('./img/');
    foreach($files as $file) {
        if($file !== "." && $file !== "..") {
            echo "<input id='btn$x' type='image' src='./img/$file' width='40' height ='40' onclick='input(this);' />";
        if($x % 8 == 0){
        	echo "<br />";
       	}
            $x++;
        }           
    }
?>
