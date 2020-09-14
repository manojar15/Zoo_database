<html>
<body>
<a href="Home.php"><font color="Red"><h2>Home</h2></font></a>
<center>
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    mysqli_select_db($dbconn,'Animal_Class');
    
    if(isset($_GET['add'])){ 
    $animalclassid=$_GET["animalclassid"];
    $familyname=$_GET["familyname"];
    $speciesname=$_GET["speciesname"];
    $animalcolor=$_GET["animalcolor"];
    $sfcname=$_GET["sfcname"];	
        $add="INSERT INTO Animal_class values('$animalclassid', '$familyname', '$speciesname','$animalcolor','$sfcname')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:animalclass.php");
    }
   
    ?>
	 <style>
		body{
			color:white;
			box-shadow:inset 0 0 0 100vw rgba(0,0,0,0.5);
			background-image:url("back10.jpg");
			background-blend-mode:screen,difference,lighten;
			background-repeat:no-repeat;
			background-size:100% 100%;
		    }
		</style>	
    <h2><font color="White">Add New Animal Classification</font></h2>
	<table>
        <form method="get" action="animalclassadd.php">
            <tr><td><label for="animalclassid">Animal Class ID: </label></td>
            <td><input type="text" name="animalclassid"></td></tr>
            <br>
            <tr><td><label for="familyname">Family Name: </label></td>
            <td><input type="text" name="familyname"></td></tr>
            <br>
            <tr><td><label for="speciesname">Species Name: </label></td>
            <td><input type="text" name="speciesname"></td></tr>
            <br>
			<tr><td><label for="animalcolor">Animal color: </label></td>
            <td><input type="text" name="animalcolor"></td></tr>
            <br>
			<tr><td><label for="sfcname">Scientific name: </label></td>
            <td><input type="text" name="sfcname"></td></tr>
            <br>
			</table>
            <input type="submit" name="add" value="Add">
        </form>
		</center>
</body>
</html>
