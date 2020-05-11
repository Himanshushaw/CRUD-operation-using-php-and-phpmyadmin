<!DOCTYPE html>
<html>
<?php include 'partial/head.php';
?>
<body>
	<?php include 'partial/nav.php';
	?>

	<form  method="POST" action="<?php $_SERVER['PHP_SELF'];?>" >
			<div class="container">
				<h2> Delete </h2>
	  <div class="form-group">
	    <label for="id"><b> Enter ID you want to access : </b></label>
	    <input type="text" class="form-control" name="id"  placeholder="Enter id ">
	  </div>
	  <button type="submit" class="btn btn-secondary" name="deletedata" value="Delete">Delete </button>
	</div>
	</form>
	<?php
	 if(isset($_POST["deletedata"]) && $_POST["deletedata"]==="Delete"){
		include 'include/db.php';
		$sql="DELETE FROM `department` WHERE id='".$_POST['id']."' ";
		if(mysqli_query($mysqli,$sql)){
			
			header('location:index.php');	
		}
		 else{
		 	echo "Unknown id" ;
		 }

	} 



	?>

</body>
</html>