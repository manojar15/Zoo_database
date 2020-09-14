<html>
<body>
<a href="home.php"><font color="Red">Home</font></a>
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    $selectstationid="SELECT Station_ID FROM Station";
    $selectresult=mysqli_query($dbconn,$selectstationid);
    $selectstaffid="SELECT Staff_ID, Staff_Type FROM Staff";
    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
    
    
    if(isset($_GET['add'])){ 
        $Staff_ID=$_GET["staffid"];
        $Station_ID=$_GET["stationid"];
        $StartTime=$_GET["starttime"];
        $EndTime=$_GET["endtime"];
     
        $add="INSERT INTO Shift_Assignment VALUES(NULL, '$Staff_ID', '$Station_ID', '$StartTime', '$EndTime')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
        if($affectedrows==1){
                header("Location:shift.php");
        }
    }
   
    ?>
	<center>
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
    <h2>Assign New Shift to Staff</h2>
	<table>
        <form method="get" action="shiftadd.php">
           <tr><td> <label for="staffid">Staff ID:</label></td>
           <td> <select name="staffid">
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Caretaker'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Caretaker">
                <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name, Staff_Name FROM Staff WHERE Staff_Type='Cashier'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Cashier">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Manager'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Manager">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
                <?php
                    $selectstaffid="SELECT Staff_ID, Staff_Name FROM Staff WHERE Staff_Type='Veterinarian'";
                    $selectstaffidresult=mysqli_query($dbconn,$selectstaffid);
                ?>
                <optgroup label="Veterinarian">
            <?php while($selectstaffidresultrow=mysqli_fetch_assoc($selectstaffidresult)){  ?>
                    <option value="<?php echo $selectstaffidresultrow['Staff_ID'] ?>"><?php echo $selectstaffidresultrow['Staff_ID'] ?> : <?php echo $selectstaffidresultrow['Staff_Name'] ?></option>
                    <?php } ?>
                </optgroup>
            </select> 
            <br></td></tr>
           <tr><td> <label for="stationid">Station ID:</label></td>
            <td><select name="stationid">
            <?php while($selectresultrow=mysqli_fetch_assoc($selectresult)){  ?>
                <option value="<?php echo $selectresultrow['Station_ID'] ?>"><?php echo $selectresultrow['Station_ID'] ?></option>
            <?php } ?>
            </select> 
            <br></td></tr>
            <tr><td><label for="starttime">Start Time: </label></td>
            <td><input type="text" name="starttime"></td></tr>
            <br>
            <tr><td><label for="endtime">End Time: </label></td>
            <td><input type="text" name="endtime"></td></tr>
            <br>
			</table>
            <input type="submit" name="add" value="Add">
			</center>
        </form>
</body>
</html>
