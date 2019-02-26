
<?php 

$path = "songs/";

$files = glob("songs/*.mp3");

foreach ($files as $val) {
	echo basename("$val");
	echo "<br/>";
}


?>