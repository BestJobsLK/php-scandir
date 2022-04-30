<?php 

	$errors = array();

	if (isset($_POST['submit'])) {
		// submitt button is clicked

		$file_name = $_FILES['image']['name'];
		$file_type = $_FILES['image']['type'];
		$file_size = $_FILES['image']['size'];
		$temp_name = $_FILES['image']['tmp_name'];

		$upload_to = 'images/';

		// checking the file type
		if ($file_type != 'image/jpeg') {
			$errors[] = 'Only JPEG files are allowed.';
		}

		// checking file size
		if ($file_size > 500000) {
			$errors[] = 'File size should be less than 500kb.';
		}
		
		if (empty($errors)) {
			$file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Upload</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">
		
		<h1>Image Upload</h1>
		<h3>Choose an Image and Click Upload</h3>

		<?php 
			if (!empty($errors)) {
				echo '<div class="errors">';
				echo '<b>File not uploaded. Check following errors:</b><br>';
				foreach ($errors as $error) {
					echo '- ' . $error;
				}
				echo '</div>';
			}

		 ?>

		<form action="index.php" method="post" enctype="multipart/form-data">
			
			<input type="file" name="image" id="">
			<p>Note: JPEG files less than 500kb only.</p>
			<button type="submit" name="submit">Upload</button>

		</form>

		<?php 
			if (isset($file_uploaded)) {
				echo '<h3>Uploaded File</h3>';
				echo '<img src="' . $upload_to . $file_name . '" style="height:200px">';
			}

		 ?>

		 <h3><a href="gallery.php">Photo Gallery</a></h3>

	</div> <!-- .container -->
</body>
</html>