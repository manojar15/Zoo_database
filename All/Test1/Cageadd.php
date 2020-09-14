<html>

<body>
<a href="Home.php"><font color="Red">Home</font></a>
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    $selectstationid="SELECT Station_ID FROM Station";
    $selectresult=mysqli_query($dbconn,$selectstationid);
    
    
    if(isset($_GET['add'])){ 
	  
        $Station_ID=$_GET["stationid"];
        $Cage_Type=$_GET["cagetype"];
        $Cage_size=$_GET["cagesize"];
        $Cage_material=$_GET["cagematerial"];
        $add="INSERT INTO Cage VALUES('$Station_ID',NULL,'$Cage_Type', '$Cage_size', '$Cage_material')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
        if($affectedrows==1){
                header("Location:cage.php");
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
    <h2>Add New Cage</h2>
       <table>
	   
	   <form method="get" action="cageadd.php">
           <tr><td><label for="stationid">Station ID</label></td>
            <td><select name="stationid">
            <?php while($selectresultrow=mysqli_fetch_assoc($selectresult)){  ?>
                <option value="<?php echo $selectresultrow['Station_ID'] ?>"><?php echo $selectresultrow['Station_ID'] ?></option>
            <?php } ?>
            </select> </td>
			</tr>
            <br>
            <br>
            <tr>
			<td><label for="cagetype">Cage Type: </label></td>
            <td><input type="text" name="cagetype"></td></tr>
            <br>
            <tr><td><label for="cagesize">Cage Size: </label></td>
            <td><input type="text" name="cagesize"></td></tr>
            <br>
            <tr><td><label for="cagematerial">Cage material: </label></td>
            <td><input type="text" name="cagematerial"></td></tr>
            <br>
			</table>
            <input type="submit" name="add" value="Add">
        </form>
            </center>
</body>
</html>
