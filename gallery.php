<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Photo Gallery</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">
		<h1>Photo Gallery</h1>		

		<h3><a href="index.php">Upload Image</a></h3>

		<div class="gallery">

			<?php 

				// reading the list of files in the folder

				$file_list = scandir('images/');

				foreach ($file_list as $file) {
					if ( substr($file, strlen($file)-3) == 'jpg' ) {
						echo '<img src="images/' . $file . '">';
					}
				}

			 ?>			

		</div> <!-- .gallery -->

	</div> <!-- .container -->
</body>
</html>