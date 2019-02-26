<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>


	

<?php 

$path = "songs/";

$files = glob("songs/*.mp3");


$playlists = array("");



if(isset($_GET["playlist"]))
	{
		$files = array();
		$tmpfiles =array();

		$fileName = $_GET["playlist"];

		$fileData = file_get_contents("songs/".$fileName);

		$tmpfiles = explode("\n", $fileData);

		for($i= 0 ; $i < count($tmpfiles); $i++)
		{
			$files[$i] = "songs/".$tmpfiles[$i];
		}
		

		$playlists = array("");  	

	} else{
		$playlists = glob("songs/*.txt");
	}

?>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>

		<div id="listarea">
			<ul id="musiclist">
				<?php foreach($files as $file){?>
			
				<li class="mp3item">
					<a href="<?php echo $files[$i] ?>">
					<?= basename($file);
					$fileSize = filesize($file);
					
					if($fileSize > 0 && $fileSize < 1023)
					{
						echo "  ($fileSize bytes)";
					}
					elseif ($fileSize > 1023 && $fileSize < 1048575) {
						$fileSize =$fileSize / 1024;
						echo " (".round($fileSize,2)." KB)";
					}
					elseif ($fileSize > 1048575 ) {
						$fileSize =$fileSize / 1048576;
						echo " (".round($fileSize,2)." MB)";
					}

					} 

					?>

					</a>
				</li>
				<li class="playlistitem">
	            <a href="music.php">All music</a>
	        </li>

				<?php 
					for($i = 0 ; $i < count($playlists);$i++){
				?>

				<li class="playlistitem">
					
					<a href="music.php?playlist=<?= basename($playlists[$i]);?>">
					<?php 
					echo basename($playlists[$i]);

					} 
					?>
					</a>
					
				</li>
				 
			</ul>
		</div>



	</body>
</html>




