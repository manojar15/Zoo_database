<?php
    $dbconn = mysqli_connect("localhost","root","","Test1");
?>
<html>
    <head>
        <meta charset="utf-8">
            <title> Framework Test page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>
<body>
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
        <table style="text-align:center">
		<tr bgcolor="LightBlue" color="Black">
		                <th><a href="Home.php">Home</a></th>
						<th><a href="Animal.php">Animal</a></th>
                        <th><a href="Cage.php">Cage</a></th>
                        <th><a href="Animalclass.php">Animal Class</a></th>
                        <th><a href="Staff.php">Staff</a></th>
                        <th><a href="Shift.php">Shift</a></th>
                        <th><a href="Station.php">Station</a></th>
                         <th><a href="Animalsearch.php">Search For Animals</a></th>
         </tr>	   
	   </table>     
            <h1 style="text-align: center"><font color="Blue">Details of Station</font> <u> </u></h1>
        <div class="row">
            <div class="row">
                <div class="col-2" style="text-align: left;background-color: #D6DAF0;">
                    <h3 style="text-align: center;"><font color="Blue">options</font></h3>
                    <ul>

                    </ul>
                </div>

                <div class="col-15" style="text-align: center;">
                    <form method="get" action="animalsearch.php">
						<label for="search"><h2><font color="White">Enter the animal nickname</font></h2></label>
                        <br>
                        <input type="search" name="searchword" autofocus>
                        <input type="submit" name="search" value="Search">
                        
                    </form>
                    <h3><font color="">Searching for the keyword </font></h3> 
                    <?php
                        if(isset($_GET['search'])){
                            $Animal_Nick = $_GET['searchword'];					
                            echo " : ".$Animal_Nick;
                            $sql_detailsearch = "SELECT * FROM (SELECT * FROM Animals WHERE Animal_Nick LIKE '%$Animal_Nick%') as FindAnimal NATURAL JOIN Cage";
                            $pass_detailsearch = mysqli_query($dbconn, $sql_detailsearch);
                    ?>
                        <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr bgcolor="blue">
                            <th>Station ID</th>
                            <th>Cage No : Cage Type</th>
                            <th>Animal ID</th>
                            <th>Animal Nick</th>
                            <th>Gender</th>
                            <th>Animal Classification</th>
                        </tr> 
                    <?php
                            $results_detailsearch = mysqli_fetch_assoc($pass_detailsearch);
                    ?>
                        <tr bgcolor="black" style="text-align: center;">
                            <td><?php echo $results_detailsearch['Station_ID']?></td>
                            <td><?php echo $results_detailsearch['Cage_No']?> : <?php echo $results_detailsearch['Cage_Type']?></td>
                            <td><?php echo $results_detailsearch['Animal_ID']?></td>
                            <td><?php echo $results_detailsearch['Animal_Nick']?></td>
                            <td><?php echo $results_detailsearch['Gender']?></td>
                            <td><?php echo $results_detailsearch['Animal_ClassID']?></td>
                        </tr>
                        </table> 
                        <p style="text-align: left;"><h2><font color="White"> Caretaker and Veterinarian Assigned</font> </h2></p>
                    <?php
                        $Station_ID = $results_detailsearch['Station_ID'];
                        $sql_vetcare = "SELECT * FROM (SELECT DISTINCT Staff_ID FROM Shift_Assignment WHERE Station_ID='$Station_ID')AS StaffonStation NATURAL JOIN Staff WHERE Staff_Type='Caretaker' OR Staff_Type='Veterinarian';";
                        $pass_vetcare = mysqli_query($dbconn, $sql_vetcare);
                    ?>
                        <table border="1" style="width: 100%; margin-top: 10px;">
                            <tr bgcolor="blue">
                                <th>Staff ID</th>
                                <th>Staff Name</th>
                                <th>Staff Type</th>
                            </tr> 
                            <style>
                            table{
									border:1px;
									width:100%;
									margin-top:10px;
									background-color:white;
									text-align:center;
								 }
							tr,td,th{
								border:1px solid black;
								}
								 a{
			                 	text-decoration:none;
				                font-size:20px;
				                color:black;
		                	}
                        </style>							
                    <?php
                        while ( $results_vetcare = mysqli_fetch_assoc($pass_vetcare)){
                    ?>
                            <tr bgcolor="black" style="text-align: center;">
                             <td><?php echo $results_vetcare['Staff_ID']?></td>    
                             <td><?php echo $results_vetcare['Staff_Name']?></td>
                             <td><?php echo $results_vetcare['Staff_Type']?></td>
                    <?php
                        }
                    ?>
                            </tr>
                        </table>
                    <?php        
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </body>
</html>