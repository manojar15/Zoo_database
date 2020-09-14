<html>
<body>
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
    
    if(isset($_GET['submit'])){ 
    $Station_ID=$_GET["stationid"];
    $Station_Name=$_GET["stationname"];
	$Start_time=$_GET["starttime"];
	$End_time=$_GET["endtime"];
     
        $new="INSERT INTO Station values('$Station_ID','$Station_Name','$Start_time','$End_time')";
        mysqli_query($dbconn,$new);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:station.php");
    }
   
    ?>
	<center>
	<table>
    <h2>Add New Station</h2>
        <form method="get" action="stationadd.php">
            <tr><td><label for="stationid">Station ID: </label></td>
            <td><input type="text" name="stationid"></td></tr>
            <br>
            <tr><td><label for="stationname">Station Name: </label></td>
            <td><input type="text" name="stationname"></td></tr>
            <br>
			<tr><td><label for="stationname">Start time: </label></td>
            <td><input type="text" name="starttime"></td></tr>
            <br>
			<tr><td><label for="stationname">End time: </label></td>
            <td><input type="text" name="endtime"></td></tr>
            <br>
			</table>
            <input type="submit" name="submit" value="Add">
        </form>
		</center>
</body>
</html>
