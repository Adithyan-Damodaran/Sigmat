<?php
include('includes/conn.php');

session_start();


$query = "SELECT * FROM products";
$result = mysqli_query( $conn, $query );



if( isset( $_GET['alert'] ) ) {
    
    if( $_GET['alert'] == 'success' ) {
        $alertMessage = "<div class='alert alert-success'>New Product added! <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    } elseif( $_GET['alert'] == 'updatesuccess' ) {
        $alertMessage = "<div class='alert alert-success'>Product updated! <a class='close' data-dismiss='alert'>&times;</a></div>";
    
    } elseif( $_GET['alert'] == 'deleted' ) {
        $alertMessage = "<div class='alert alert-success'>Product deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
    }
      
}

mysqli_close($conn);
include('includes/header.php');

 if(isset($_GET['alert'])){echo $alertMessage; }?>

<table class="table table-striped table-bordered">
    <tr>
        <th>PRODUCT IMAGE</th>
        <th>TYPE</th>
        <th>MODEL</th>
        <th>PACKING IMAGE</th>
        <th>MRP</th>
        <th>SIGMAT</th>
    </tr>
    
    <?php
    
    if( mysqli_num_rows($result) > 0 ) {
        
        
        while( $row = mysqli_fetch_assoc($result) ) {
            echo "<tr>";
            
            echo '<td><img style=" border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 70px;height: 60px; "src="'.$row["p_img"].'"/></td>'; 
			echo "<td>".$row['p_type']."</td><td>".$row['p_model']."</td>";
            echo '<td><img style=" border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 70px;"src="'.$row["pk_img"].'"/></td>'; 
			echo "<td>&#8377;".$row['mrp']."</td>";
			echo "<td>&#8377;".$row['s_rate']."</td>";
            echo "</tr>";
        }
    } else { 
	echo "<div class='alert alert-warning'>You have no products!</div>";
    }

  
    ?>

    <tr>
		<td colspan="7"><div class="text-left"><a href="add.php" type="button" class="btn btn-sm btn-success"> Add Products</a></div></td>
		<!--<td colspan="7"><div class="text-right"><a href="remove.php" type="button" class="btn btn-sm btn-danger">Remove Products</a></div></td>-->
    </tr>
</table>

<!--<div class="text-left" style="padding-left:50%;"><a href="check.php" type="button" class="btn btn-sm btn-danger">Decrypt Data </a></div>-->
<?php
include('includes/footer.php');
?>


















