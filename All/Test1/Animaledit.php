<html>

<body>

    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    if(isset($_GET['update'])){ 
        $Animal_ID=$_GET["animalid"];
        $Animal_Nick=$_GET["animalnick"];
        $Gender=$_GET["gender"];
        $Cage_No=$_GET["cageno"];
        $Animal_ClassID=$_GET["animalclassid"];
        $Animal_age=$_GET["animal_age"];
        $Animal_weight=$_GET["animal_weight"];		
        $update_Query = "UPDATE Animals SET Cage_No='$Cage_No', Animal_Nick='$Animal_Nick', Gender='$Gender', Cage_No='$Cage_No', Animal_ClassID='$Animal_ClassID', Animal_age='$Animal_age',Animal_weight='$Animal_weight' WHERE Animal_ID='$Animal_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);
        header("Location:animal.php");
    }else {
        $edit_Animal_ID = $_GET["animalid"];
        $edit_Query="SELECT * FROM Animals WHERE Animal_ID='$edit_Animal_ID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
    }
    ?>
    
    <center>
	<table>
	<div class="right">
	<a href="home.php"><font color="red">Home</font></a></div>
	<h2>Editing Animal: #<u><?php echo $edit_Animal_ID?></u></h2>
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
	<h1>Update Animal details</h1>
    <form method="get" action="animaledit.php">
            <input type="hidden" name="animalid" value="<?php echo $edit_Animal_ID?>" >
           <tr><td> <label for="animalnick">Animal Nickname: </label></td>
           <td> <input type="text" name="animalnick" value="<?php echo $edit_Results['Animal_Nick']?>"></td></tr>
            <br><tr><td>
            <label for="gender">Gender</label></td>
            <td><select name="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select></td></tr>
            <br>
            <tr><td><label for="cageno">Cage No</label></td>
            <td><input type="text" name="cageno"></td></tr>
            <br>
            <tr><td><label for="animalclassid">Animal Classification</label></td>
            <td><select name="animalclassid">
                <?php
                    $selectanimalclassid="SELECT Animal_ClassID, Family_Name, Species_Name FROM Animal_Class ORDER BY (Family_Name)";
                    $selectanimalclassidresult=mysqli_query($dbconn,$selectanimalclassid);
                    while($selectanimalclassidresultrow=mysqli_fetch_assoc($selectanimalclassidresult)){ ?>
                <option value="<?php echo $selectanimalclassidresultrow['Animal_ClassID'] ?>"><?php echo $selectanimalclassidresultrow['Family_Name'] ?>  <?php echo $selectanimalclassidresultrow['Species_Name'] ?></option>
                <?php } ?>
            </select><td></tr>
            <br>
			 <tr><td><label for="animal_age">Animal_age</label></td>
			<td><input type="text" name="animal_age"></td></tr>
			<tr><td><label for="animal_weight">Animal_weight</label></td>
			<td><input type="text" name="animal_weight"></td></tr>
		  </table>
		  <br>
          <input type="submit" name="update" value="Save">
        </form>
		</center>
    </body>
</html>
