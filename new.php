<!DOCTYPE html>
<html>

<?php

 include 'partial/head.php'; 
?>

<body>

	<?php 
  include 'partial/nav.php'; 
	?>

    <div class="container">
    	<h2>Update Form</h2>
  <form action= "<?php $_SERVER['PHP_SELF']; ?>" method="POST" >

  <div class="form-group">
    <label for="id"><b> Enter ID you want to access : </b></label>
    <input type="text" class="form-control" name="id"  placeholder="Enter id ">
  </div>
  <button type="submit" class="btn btn-secondary" name="showdata" value="Show">Show </button>

</form>

	<?php

  if(isset($_POST["showdata"]) && $_POST["showdata"]==="Show"){

  include 'include/db.php';
  $sql = "SELECT * FROM `department` WHERE id= '".$_POST['id']."' ";
  $result = mysqli_query($mysqli, $sql); 

  if(mysqli_num_rows($result) > 0 ){
  while($row=mysqli_fetch_assoc($result))
  {


?>


<form method="POST" action="index.php" id="newform" name="newform">

  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First name" value="<?php echo $row['firstname'];?>" >
    <small id="firstnameError"></small>
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" value="<?php echo $row['lastname'];?>">
    <small id="lastnameError"></small>
  </div>

  <div class="form-group">
    <label for="occupation">Occupation</label>
    <select class="form-control" id="occupation" name="occupation">
    	<option value="">Select</option>
    	<option value="Bussiness" <?php if($row['occupation'] == "Bussiness"){echo "Selected";}?>>Bussiness</option>
    	<option value="Service" <?php if($row['occupation'] == "Service"){echo "Selected";}?>>Service</option>
    	<option value="Student" <?php if($row['occupation'] == "Student"){echo "Selected";}?>>Student</option>
      <option value="King" <?php if($row['occupation'] == "King"){echo "Selected";}?>>King</option>
      
    	<option value="others" <?php if($row['occupation'] == "others"){echo "Selected";}?>>others</option>  	
    </select>
    <small id="occupationError"></small>
  </div>

		<div class="form-group">
			<label>Select Gender</label>
			<label class="radio"><input type="radio" name="optradio"  value="male"  <?php if($row['optradio'] == "male"){echo "Checked";}?>>Male</label>
			<label class="radio"><input type="radio" name="optradio"  value="female"  <?php if($row['optradio'] == "female"){echo "Checked";}?> >Female</label>
			<label class="radio"><input type="radio" name="optradio"  value="others"  <?php if($row['optradio'] == "others"){echo "Checked";}?> >Others</label>			
		</div>



  <div class="form-group">
    <label for="course">Courses</label>
    <select class="form-control" id="course" name="course">
    	<option value="">Select</option>
    	<option value="BCA" <?php if($row['course'] == "BCA"){echo "Selected";}?>>BCA</option>
    	<option value="MCA" <?php if($row['course'] == "MCA"){echo "Selected";}?>>MCA</option>
    	<option value="Btech" <?php if($row['course'] == "Btech"){echo "Selected";}?>>Btech</option>
      <option value="phd" <?php if($row['course'] == "Mtech"){echo "Selected";}?>>Mtech</option> 
      <option value="phd" <?php if($row['course'] == "BA"){echo "Selected";}?>>BA</option> 
      <option value="phd" <?php if($row['course'] == "MA"){echo "Selected";}?>>MA</option> 
      <option value="phd" <?php if($row['course'] == "BSC"){echo "Selected";}?>>BSC</option> 
      <option value="phd" <?php if($row['course'] == "MSC"){echo "Selected";}?>>MSC</option> 
      <option value="phd" <?php if($row['course'] == "BCom"){echo "Selected";}?>>BCom</option> 
      <option value="phd" <?php if($row['course'] == "MCom"){echo "Selected";}?>>MCom</option> 
    	<option value="phd" <?php if($row['course'] == "Intermidiate"){echo "Selected";}?>>phd</option> 
      <option value="phd" <?php if($row['course'] == "Matriculation"){echo "Selected";}?>>Intermidiate</option> 
      <option value="phd" <?php if($row['course'] == "phd"){echo "Selected";}?> >phd</option>
    	</select> 
      <small id="courseError"></small>  
  	</div>
    <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">

  	<button type="submit" name="update" value="Update" class="btn btn-secondary">Update Data </button> 

</form><br>
<?php
  }
}
else{
	echo "<b>oops!  0 results Found. Try again  </b>";
}
} 

?>
</div>
<script src='htdocs/CRUD/jquery.min.js'></script>
<script>

$(document).ready(function(){

  $("#newform").submit(function(){

    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var occupation = $("#occupation").val();
    var course = $("#course").val();

    var isError=0;


    $("#firstnameError").text("");
    $("#lastnameError").text("");
    $("#occupationError").text("");
    $("#courseError").text("");

    $("#firstname").removeClass("errorClass");
    $("#lastname").removeClass("errorClass");
    $("#occupation").removeClass("errorClass");
    $("#course").removeClass("errorClass");


    if(firstname==""){
      $("#firstnameError").text("Please Enter Your First Name.").addClass("errorText");
      $("#firstname").addClass("errorClass");
      isError = 1;
    }

    if(lastname==""){
      $("#lastnameError").text("Please Enter Your Last Name.").addClass("errorText");
      $("#lastname").addClass("errorClass");
      isError = 1;
    }

    if(occupation==""){
      $("#occupationError").text("Please Select Your Occupation.").addClass("errorText");
      $("#occupation").addClass("errorClass");
      isError = 1;
    }

    if(course==""){
      $("#courseError").text("Please Select Your Course Name.").addClass("errorText");
      $("#course").addClass("errorClass");
      isError = 1;
    }
    if(isError == 1){
      return false;
    }
    return true;
  })

})  

</script>
</body>
</html>

