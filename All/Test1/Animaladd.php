<html>
<body>
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    $selectcageno="SELECT Station_ID, Cage_No, Cage_Type FROM Cage ORDER BY (Station_ID)";
    $selectcagenoresult=mysqli_query($dbconn,$selectcageno);
    if(isset($_GET['add'])){ 
        $Animal_ID=$_GET["animalid"];
        $Animal_Nick=$_GET["animalnick"];
        $Gender=$_GET["gender"];
        $Cage_No=$_GET["cageno"];
        $Animal_ClassID=$_GET["animalclassid"];
		$Animal_age=$_GET["animal_age"];
		$Animal_weight=$_GET["animal_weight"];
        $add="INSERT INTO `Animals` (`Cage_No`, `Animal_ID`, `Animal_Nick`, `Gender`, `Animal_ClassID`,`Animal_age`,`Animal_weight`) VALUES ('$Cage_No', '$Animal_ID', '$Animal_Nick','$Gender', '$Animal_ClassID','$Animal_age','$Animal_weight')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        if($affectedrows==1){
                header("Location:animal.php");
        }        
    }
   
    ?>
    <center>
	<table>
	<tr>
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
	</style>
	<a href="home.php"><font color="Red">Home</font></a>
	<h1>Add New Animal</h1>
       <form method="get" action="animaladd.php">
           <tr><td> <label for="animalid">Animal ID: </label></td>
            <td> <input type="text" name="animalid"></td></tr>
            <br>
            <tr><td><label for="animalnick">Animal Nickname: </label></td>
            <td><input type="text" name="animalnick"></td></tr>
            <br>
            <tr><td><label for="gender">Gender</label></td>
            <td><select name="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select></td></tr>
            <br>
            <tr><td><label for="cageno">Cage type</label></td>
            <td><select name="cageno">
            <?php while($selectcagenoresultrow=mysqli_fetch_assoc($selectcagenoresult)){  ?>
                <option value="<?php echo $selectcagenoresultrow['Cage_No'] ?>"><?php echo $selectcagenoresultrow['Station_ID'] ?> ><?php echo $selectcagenoresultrow['Cage_Type'] ?></option>
            <?php } ?>
            </select> 
            <br></td></tr>
            <?php
                $selectanimalclassid="SELECT Animal_ClassID, Family_Name, Species_Name FROM Animal_Class ORDER BY (Family_Name)";
                $selectanimalclassidresult=mysqli_query($dbconn,$selectanimalclassid);
            ?>
           <tr><td> <label for="animalclassid">Animal Classification</label></td>
            <td><select name="animalclassid">
                <?php
                    while($selectanimalclassidresultrow=mysqli_fetch_assoc($selectanimalclassidresult)){ ?>
                <option value="<?php echo $selectanimalclassidresultrow['Animal_ClassID'] ?>"><?php echo $selectanimalclassidresultrow['Family_Name'] ?> > <?php echo $selectanimalclassidresultrow['Species_Name'] ?></option>
                <?php } ?>
            </select></td></tr>
            <tr><td><label for="animal_age">Animal_age</label></td>
			<td><input type="text" name="animal_age"></td></tr>
			<tr><td><label for="animal_weight">Animal_weight</label></td>
			<td><input type="text" name="animal_weight"></td></tr></table>
			<br>
			<input type="submit" name="add" value="Add"></td>
        </form>
		</center>
</body>
</html>

