	
<?php 
include('includes/conn.php');
session_start();

function validateFormData($formData) {
    $formData = trim( stripslashes( htmlspecialchars( strip_tags( str_replace( array( '(', ')' ), '', $formData ) ), ENT_QUOTES ) ) );
    return $formData;
}




include('includes/header.php');
?>

<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Product Image</label>
       <input type="file" class="form-control input-lg" name="pimg" >
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Product Type</label>
        <input type="text" class="form-control input-lg" id="client-type" name="ptype" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Product Model</label>
        <input type="text" class="form-control input-lg" id="client-model" name="pmodel" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Packaging Image</label>
	<input type="file"   class="form-control input-lg" id="client-pkimg" name="pkimg">

	</div>
    <div class="form-group col-sm-6">
        <label for="client-company">Price</label>
        <input type="number" class="form-control input-lg" id="client-price" name="mrp" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Signat Rate</label>
        <input type="number" class="form-control input-lg" id="client-price" name="srate" value="">
    </div>
    
    <div class="col-sm-12">
            <a href="clients.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Product</button>
    </div>
	</form>
		<?php
	if( isset( $_POST['add'] ) ) {
    
		$ptype=$pmodel=$mrp="";
    
		if( !$_POST["ptype"] ) {
			$ptypeError = "Please enter a type <br>";
			} else {
			$ptype = validateFormData( $_POST["ptype"] );
		}

		if( !$_POST["pmodel"] ) {
			$pmodelError = "Please enter a model <br>";
		
			} else {
				$pmodel = validateFormData( $_POST["pmodel"] );
		}
		
		$mrp    = validateFormData( $_POST["mrp"] );
		$srate    = validateFormData( $_POST["srate"] );		
		$target_dir1 = "img/products/";
		$target_dir2 = "img/packages/";
		$target_file1 = $target_dir1 . basename($_FILES["pimg"]["name"]);
		$target_file2 = $target_dir2 . basename($_FILES["pkimg"]["name"]);
		$uploadOk = 1;
		$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check1 = getimagesize($_FILES["pimg"]["tmp_name"]);
				$check2 = getimagesize($_FILES["pkimg"]["tmp_name"]);
				if($check1 == false || $check2== false) {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file1) && file_exists($target_file2)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["pimg"]["size"] > 500000 ||$_FILES["pkimg"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
			&& $imageFileType1 != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["pkimg"]["tmp_name"], $target_file2)) {
					echo "The file ". basename( $_FILES["pimg"]["name"]). " has been uploaded.";
					 echo "The file ". basename( $_FILES["pkimg"]["name"]). " has been uploaded.";
					 
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		if($uploadOk){
			if( $ptype && $pmodel ) {
					
				$query = "INSERT INTO products ( id, p_img, p_type, p_model, pk_img, mrp, s_rate, date	) VALUES ( NULL, '$target_file1', '$ptype', '$pmodel', '$target_file2', '$mrp','$srate', CURRENT_TIMESTAMP)";
					
				$result = mysqli_query( $conn, $query );
				
				if( $result ) {
					
					header( "Location: products.php?alert=success" );
				} else {
					
					echo "Error: ". $query ."<br>" . mysqli_error($conn);
				}
				
			}	
		}
		else{
			echo"<div class='alert alert-warning'>You have no products!</div>";
		}
	}
	
include('includes/footer.php');
		?>
	
<!--<div class="text-left" style="padding-left:50%;"><a href="check.php" type="button" class="btn btn-sm btn-danger">Decrypt Data </a></div>-->




















