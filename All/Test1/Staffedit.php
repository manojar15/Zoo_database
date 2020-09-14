<html>
<body>
<a href="home.php"><font color="Red">Home</font></a>
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
    <?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
    mysqli_select_db($dbconn,'Staff');
    
    if(isset($_GET['update'])){ 
        $Staff_ID=$_GET["staffid"];
        $Staff_Name=$_GET["staffname"];
        $Staff_Type=$_GET["stafftype"];
		$Staff_adress=$_GET["Staff_adress"];
	    $Staff_pno=$_GET["Staff_pno"];  
        $update_Query = "UPDATE Staff SET Staff_Name='$Staff_Name', Staff_Type='$Staff_Type',Staff_adress='$Staff_adress',Staff_pno='$Staff_pno' WHERE Staff_ID='$Staff_ID'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:staff.php");
        }
    }else {
        $edit_Staff_ID = $_GET["staffid"];
        $edit_Query="SELECT Staff_Name, Staff_Type FROM `Staff` WHERE `Staff_ID`='$edit_Staff_ID'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);           
    }
    ?>
    <table>
    <h2>Edit Animal Class ID: <u><?php echo $edit_Staff_ID?></u></h2>
            <form method="get" action="staffedit.php">
            <input type="hidden" name="staffid" value="<?php echo $edit_Staff_ID?>" >
            <tr><td><label for="staffname">Staff Name: </label></td>
            <td><input type="text" name="staffname" value="<?php echo $edit_Results['Staff_Name']?>"></td></tr>
            <br>
            <tr><td><label for="stafftype">Staff Type: </label></td>
            <td><input type="text" name="stafftype" value="<?php echo $edit_Results['Staff_Type']?>"></td></tr> 
			<br>
			<tr><td><label for="Staff_adress">Staff Adress: </label></td>
            <td><input type="text" name="Staff_adress"></td></tr>
            <br>
			<tr><td><label for="Staff pno">Staff Phone no: </label></td>
            <td><input type="text" name="Staff pno"></td></tr>
            <br>
			</table>
            <input type="submit" name="update" value="Save">
        </form>
		</center>
</body>
</html>
