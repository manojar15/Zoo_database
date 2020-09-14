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
    mysqli_select_db($dbconn,'Staff');
    
    if(isset($_GET['add'])){ 
    $Staff_ID=$_GET["staffid"];
    $Staff_Name=$_GET["staffname"];
    $Staff_Type=$_GET["stafftype"];
	$Staff_adress=$_GET["staffadress"];
	$Staff_pno=$_GET["staffpno"];
     
        $add="INSERT INTO Staff values('$Staff_ID', '$Staff_Name', '$Staff_Type','$Staff_adress','$Staff_pno')";
        mysqli_query($dbconn,$add);
        $affectedrows = mysqli_affected_rows($dbconn);
        
    if($affectedrows==1)
            header("Location:staff.php");
    }
   
    ?>
	<center>
	<table>
    <h2>Add New Staff</h2>
        <form method="get" action="Staffadd.php">
            <tr><td><label for="staffid">Staff ID: </label></td>
            <td><input type="text" name="staffid"></td></tr>
            <br>
            <tr><td><label for="staffname">Staff Name: </label></td>
            <td><input type="text" name="staffname"></td></tr>
            <br>
            <tr><td><label for="stafftype">Staff Type: </label></td>
            <td><input type="text" name="stafftype"></td></tr>
            <br>
			<tr><td><label for="staffadress">Staff Adress: </label></td>
            <td><input type="text" name="staffadress"></td></tr>
			<tr><td><label for="staffpno">Staff phone no: </label></td>
            <td><input type="text" name="staffpno"></td></tr>
			</table>
            <input type="submit" name="add" value="Add">
        </form>
		</center>
</body>
</html>
