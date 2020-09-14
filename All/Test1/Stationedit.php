<html>
<body>
<center>
<a href="home.php"><font color="Red">Home</font></a>
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
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    mysqli_select_db($dbconn,'Station');
    
    if(isset($_GET['update'])){ 
        $Station_ID=$_GET["stationid"];
		$Station_Name=$_GET["stationname"];
        $Start_time=$_GET["starttime"];
	    $End_time=$_GET["endtime"];
        $update_Query = "UPDATE Station SET Station_Name='$Station_Name',Start_time='$Start_time',End_time='$End_time' WHERE Station_ID='$Station_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1)
            header("Location:station.php");
    }else {
        $edit_Station_ID = $_GET["station_id"];
		
        $edit_Query="SELECT Station_Name FROM Station where Station_ID='$edit_Station_ID'";
        $edit_Pass_Query = mysqli_query($dbconn,$edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
    <table>
    <h4>Edit Station <u><?php echo $edit_Station_ID?></u></h4>
           <form method="get" action="stationedit.php">
            <input type="hidden" name="stationid" value="<?php echo $edit_Station_ID?>" >
            <tr><td><label for="stationname">Station Name: </label></td>
            <td><input type="text" name="stationname"></td></tr>
            <br>
			<tr><td><label for="starttime">Start time</label></td>
			<td><input type="text" name="starttime"></td></tr>
            <br>
			<tr><td><label for="endtime">End time</label></td>
			<td><input type="text" name="endtime"></td></tr>
            <br>
		    </table>
            <input type="submit" name="update" value="Save">
        </form>
</center>	
</body>
</html>
