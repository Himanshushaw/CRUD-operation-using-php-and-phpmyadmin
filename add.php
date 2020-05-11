

<?php
    include 'include/db.php';
      if (isset($_POST["submit"]) && $_POST["submit"]==="Submit"){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $occupation = $_POST['occupation'];
      $optradio = $_POST['optradio'];
      $course = $_POST['course'];

      

      echo " Firstname is ".$firstname;
      echo " Lastname is ".$lastname;
      echo " occupation  is ".$occupation;
      echo " optradio is ".$optradio;
      echo " course is ".$course;

      $sql="INSERT INTO `department` (`firstname`,`lastname`,`occupation`,`optradio`,`course`) VALUES ('$firstname','$lastname','$occupation','$optradio','$course')";
      
    if(mysqli_query($mysqli, $sql)) {
      header("location:index.php");

        
        //echo "New record created successfully!";

  }
      else {
        echo "Error: " . $sql . "" . mysqli_error($mysqli);
      }

    }   
      ?>



<!DOCTYPE html>
<html>
<?php include 'partial/head.php'; 

?>



<body>
	<?php include_once 'partial/nav.php'; 
 
	?>


<div class="container">

<form method="POST" action="" id="newform" name="newform">

  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First name">
    <small id="firstnameError"></small>
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name">
    <small id="lastnameError"></small>
  </div>

  <div class="form-group">
    <label for="occupation">Occupation</label>
    <select class="form-control" id="occupation" name="occupation">
    	<option value="">Select</option>
    	<option value="Bussiness">Bussiness</option>
    	<option value="Service">Service</option>
    	<option value="Student">Student</option>
    	<option value="King">King</option>
    	<option value="others">others</option>  	
    </select>
    <small id="occupationError"></small>
  </div>

		<div class="form-group">
			<label>Select Gender</label>
			<label class="radio"><input type="radio" name="optradio"  checked value="male" >Male</label>
			<label class="radio"><input type="radio" name="optradio"  value="female" >Female</label>
			<label class="radio"><input type="radio" name="optradio"  value="others" >Others</label>	

		</div>



  <div class="form-group">
    <label for="course">Courses</label>
    <select class="form-control" id="course" name="course">
    	<option value="">Select</option>
    	<option value="BCA">BCA</option>
    	<option value="MCA">MCA</option>
    	<option value="Btech">Btech</option>
    	<option value="Mtech">Mtech</option>
      <option value="BA">BA</option>
      <option value="MA">MA</option>
      <option value="BSC">BSC</option>  	 
      <option value="MSC">MSC</option>
      <option value="BCom">BCom</option>
      <option value="MCom">MCom</option>
      <option value="Intermidiate">Intermidiate</option>
      <option value="Matriculation">Matriculation</option>
      <option value="phd">phd</option>
    	</select>   
      <small id="courseError"></small>
  	</div>

  	<button type="submit" name="submit" value="Submit" class="btn btn-primary">Add Data </button> 

</form>
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


