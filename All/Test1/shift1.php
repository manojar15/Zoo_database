<html>

<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "Test1";
        $dbconn = mysqli_connect($host,$user,$pass,$db) or die("Could not connect to database!");   

        mysqli_select_db($dbconn,'Shift');

        $query="SELECT * FROM Shift_Assignment NATURAL JOIN (SELECT Staff_ID, Staff_Name FROM Staff) as StaffNames;";
        $result=mysqli_query($dbconn,$query);
        $rownum=mysqli_num_rows($result);

    ?>
        <!DOCTYE HTML>
        <html>

        <head>
            <meta charset="utf-8">
            <title> Framework Test page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>

        <body style="; background-color: #F6F9FA;">
             <style>
		body{
			box-shadow:inset 0 0 0 100vw rgba(0,0,0,0.5);
			background-image:url("back10.jpg");
			background-blend-mode:screen,difference,lighten;
			background-repeat:no-repeat;
			background-size:100% 100%;
		    }
		</style>
 <table>
		<br>
		<tr bgcolor="LightBlue" color="Black">
 <th><a href="home1.php">Home</a></th>
						<th><a href="animal1.php">Animal</a></th>
                        <th><a href="cage1.php">Cage </a></th>
                        <th><a href="animalclass1.php">Animal Class</a></th>
                        <th><a href="staff1.php">Staff</a></th>
                        <th><a href="shift1.php">Shift</a></th>
                        <th><a href="station1.php">Station</a></th>
                         <th><a href="animalsearch1.php">Search For Animals</a></th>
						 
         </tr>	   
	   </table>     		
			<h1 style="text-align: center"><font color="white">Shift Table</font></h1>
            <br>
            <p style="text-align: center; margin-top: -30px;margin-bottom: -5px;"><font color="White">*Note: 0600H = 6AM, 1500H = 3PM, etc.</font></p>
                <div class="col-8" style="text-align: center;">
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr bgcolor="lightgreen">
                            <th>Staff ID</th>
                            <th>Staff Name</th>
                            <th>Station ID</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        
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
				                color:Black;
		                	}
                        </style>
                        <?php
                while($row=mysqli_fetch_assoc($result)){    
            ?>
                            <tr>
                                <td><?php echo $row['Staff_ID']?></td>
                                <td><?php echo $row['Staff_Name']?></td>
                                <td><?php echo $row['Station_ID']?></td>
                                <td><?php echo $row['StartTime']?>H</td>
                                <td><?php echo $row['EndTime']?>H</td>
                                
                            </tr>

                            <?php 
                }    
            ?>
                    </table>
          </body>
        </html>