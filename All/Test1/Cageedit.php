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
    
    if(isset($_GET['update'])){ 
        $Cage_No=$_GET["cageno"];
        $Cage_Type=$_GET["cagetype"];
        $Cage_size=$_GET["cagesize"];
		$Cage_material=$_GET["cagematerial"];
        $update_Query ="UPDATE Cage SET Cage_Type='$Cage_Type',Cage_size='$Cage_size',Cage_material='$Cage_material' WHERE Cage_No='$Cage_No'";
        mysqli_query($dbconn,$update_Query);
        $affectedrows = mysqli_affected_rows($dbconn);

        if($affectedrows==1){
            header("Location:cage.php");
        }
    }else {
         $edit_Cage_No = $_GET["cageno"];
        $edit_Query="SELECT Station_ID, Cage_Type,Cage_size FROM `Cage` WHERE `Cage_No`='$edit_Cage_No'";
        $edit_Pass_Query = mysqli_query($dbconn, $edit_Query);
        $edit_Results = mysqli_fetch_assoc($edit_Pass_Query);    
        
    }
    ?>
   <table> 
    <h4>Edit Cage: #<u><?php echo $edit_Cage_No?></u> on Station: <u><?php echo $edit_Results['Station_ID']?></u></h4>
            <form method="get" action="cageedit.php">
            <input type="hidden" name="cageno" value="<?php echo $edit_Cage_No?>" >
            <tr><td><label for="cagetype">Cage Type: </label></td>
            <td><input type="text" name="cagetype" value="<?php echo $edit_Results['Cage_Type']?>"></td></tr>
			<br>
            <tr><td><label for="cagesize">Cage_size</label></td>
			<td><input type="text" name="cagesize"></td></tr>
			<tr><td><label for="cagematerial">Cage_material</label></td>
			<td><input type="text" name="cagematerial"></td></tr>
			</table>
			<br>
			<br>
            <input type="submit" name="update" value="Save">
			</center>
        </form>
</body>
</html>
