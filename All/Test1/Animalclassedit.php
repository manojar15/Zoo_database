<html>
<body>
<a href="home.php"><font color="red">Home</font></a></div>
<center>
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    mysqli_select_db($dbconn,'Animal_Class');
    
    if(isset($_GET['update'])){ 
       $Animal_ClassID=$_GET["animalclassid"];
        $Family_Name=$_GET["familyname"];
        $Species_Name=$_GET["speciesname"];
		$Animal_color=$_GET["animalcolor"];
		$Sfc_name=$_GET["sfcname"];
        $update_Query = "UPDATE Animal_Class SET Family_Name='$Family_Name', Species_Name='$Species_Name', Animal_color='$Animal_color', Sfc_name='$Sfc_name' WHERE Animal_ClassID='$Animal_ClassID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:animalclass.php");
        }
    }else {
        $edit_Animal_ClassID = $_GET["animalclassid"];
        $edit_Query="SELECT Family_Name, Species_Name, Animal_color, Sfc_name  FROM `Animal_Class` WHERE `Animal_ClassID`='$edit_Animal_ClassID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    	<style>
	body{
		    color:White;
			box-shadow:inset 0 0 0 100vw rgba(0,0,0,0.5);
			background-image:url("back10.jpg");
			background-blend-mode:screen,difference,lighten;
			background-repeat:no-repeat;
			background-size:100% 100%;
	}
	a{
		text-decoration:none;
		font-size:25px;	
	    
	}
	.right{	
		text-align:left;
	}
	</style>
	<table>
    <h4>Edit Animal Class ID: <u><?php echo $edit_Animal_ClassID?></u></h4>
        <form method="get" action="animalclassedit.php">
            <input type="hidden" name="animalclassid" value="<?php echo $edit_Animal_ClassID?>" >
            <tr><td><label for="familyname">Family Name: </label></td>
            <td><input type="text" name="familyname" value="<?php echo $edit_Results['Family_Name']?>"></td></tr>
            <br>
            <tr><td><label for="speciesname">Species Name: </label></td>
            <td><input type="text" name="speciesname" value="<?php echo $edit_Results['Species_Name']?>"></td></tr>
            <br>
			<tr><td><label for="animalcolor">Animal color: </label></td>
            <td><input type="text" name="animalcolor" value="<?php echo $edit_Results['Animal_color']?>"></td></tr>
			<br>
			<tr><td><label for="sfcname">Scientific name: </label></td>
            <td><input type="text" name="sfcname" value="<?php echo $edit_Results['Sfc_name']?>"></td></tr>
			<br>
			</table>
            <input type="submit" name="update" value="Save">
        </form>
		</center>
</body>
</html>
