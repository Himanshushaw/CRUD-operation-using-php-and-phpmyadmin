
<?php //session_start();
//$_SESSION['name'] = "iugiugsdids";
    include 'include/db.php';

    if (isset($_POST["update"]) && $_POST["update"]==="Update"){
          
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $occupation = $_POST['occupation'];
      $optradio = $_POST['optradio'];
      $course = $_POST['course'];

      $sql="UPDATE `department` SET `firstname`='$firstname',`lastname`='$lastname',`occupation`='$occupation',`optradio`='$optradio', 
    `course`='$course' WHERE id='".$_POST['id']."' ";
    if(mysqli_query($mysqli,$sql)){
      //echo " Updated successfully !";
    	?>

    	<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Updated successfully !!
  </div>

<?php 
    }
    else
    {
      //echo " Error in updating  ".$sql."".mysqli_error($mysqli);
    	?>
    	<div class="alert alert-danger">
    Error in updating  !!
  </div>
  <?php

    }


    }

?>



<!DOCTYPE html>
<html>

<?php include 'partial/head.php'; 		

?>
<body>

			<?php include 'partial/nav.php'; ?>

	

				
	
					<div class="container">
						<h2 class="text-center "><mark>Data Base </mark></h2><br><br>
						<?php 
						include 'include/db.php';

						$firstname = "";
						$lastname = "";

						if(isset($_POST['firstname'])) 	{
							$firstname=" AND firstname LIKE '%".$_POST['firstname']."%' ";
						}
						
						
						if(isset($_POST['lastname'])) 	{
							$lastname=" AND lastname LIKE '%".$_POST['lastname']."%' ";
						}
						

					    $sql="SELECT * FROM department WHERE id != '' ".$firstname.$lastname."  ";
						$result=mysqli_query($mysqli,$sql);
						?>
						<form method="POST" action="">
						  <div class="form-row align-items-center">
						    <div class="col-auto" >
						      <input type="text" class="form-control " id="search" name="firstname" placeholder="SEARCH FirstName "  value="">
						    </div>
						
						    <div class="col-auto" >
						      <input type="text" class="form-control " id="searchtwo" name="lastname" placeholder="SEARCH LastName "  value="">
						    </div>
						    <button class="btn btn-primary " >Search</button>

						</div>
						</form><br>
						<?php
						if(mysqli_num_rows($result)>0){
							echo"<table class='table table-striped table-hover table-dark'>";
							echo "<thead class='text-center'>";
							echo "<tr>";
							echo "<th>ID</th>";
							echo "<th>First Name</th>";
							echo "<th>Last Name</th>";
							echo "<th>Occupation</th>";
							echo "<th>Gender</th>";
							echo "<th>Course</th>";
							echo "<th>Action</th>";
							echo "</tr>";
							echo "</thead>";
							echo "<tbody class='text-center'>";
							while($row=mysqli_fetch_assoc($result)){
								echo "<tr>
								<td><b>".$row['id']."</b></td>
								<td><b>".$row['firstname']."</b></td>
								<td><b>".$row['lastname']."</b></td>
								<td><b>".$row['occupation']."</b></td>
								<td><b>".$row['optradio']."</b></td>
								<td><b>".$row['course']."</b></td>
								<td><button class='btn btn-info btn-sm'><a class='text-white'  href='/CRUD/modify.php?id=".$row['id']."'>UPDATE</a></button>     <button class='btn btn-danger btn-sm' ><a   class='text-white'  href='/CRUD/delete.php?id=".$row['id']."' onclick='return checkdelete()'>DELETE</a></button</td>
								</tr>";

							}
							echo "</tbody>";
							echo "</table>";
						}
						else
						{
							echo " 0 result found ";
						}

						?>
						<script type="text/javascript"> 
								function checkdelete(){
									return confirm('Make sure before deleting this data!!');
								}
						</script>

					

							</div>

</body>
</html>