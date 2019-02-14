<?php
include('includes/conn.php');
if(isset($_GET['model']))
{
	$model =$_GET['model'];
	
	$query="SELECT * FROM products WHERE p_model='$model'";
	$result=mysqli_query( $conn, $query);
	 
	}
mysqli_close($conn);
include('includes/header.php');


?>
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
echo"$model";
  
    ?>
	    <tr>
		<td colspan="7"><div class="text-center"><a href="products.php" type="button" class="btn btn-sm btn-info"> View All Products</a></div></td>
    </tr>
</table>
<?php
include('includes/footer.php');
?>
