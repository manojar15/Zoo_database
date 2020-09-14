<html>

<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "Test1";
        $dbconn = mysqli_connect($host,$user,$pass,$db) or die("Could not connect to database!");   

        mysqli_select_db($dbconn,'Station');

        $query="SELECT * FROM Station";
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
		                <th><a href="home.php">Home</a></th>
						<th><a href="animal.php">Animal</a></th>
                        <th><a href="cage.php">Cage</a></th>
                        <th><a href="animalclass.php">Animal Class</a></th>
                        <th><a href="staff.php">Staff</a></th>
                        <th><a href="shift.php">Shift</a></th>
                        <th><a href="station.php">Station</a></th>
                         <th><a href="animalsearch.php">Search For Animals</a></th>
						 <th><a href="Stationadd.php"><font color=Green>Add</font></a></h3>
         </tr>	   
	   </table>     										
            <h1 style="text-align: center"><font color="white">Station Table</font></h1>
            <div class="row">
                <div class="col-8" style="text-align: center;">
                    <table border="1" style="width: 100%; margin-top: 10px;">
                        <tr bgcolor="lightgreen">
                            <th>Station ID</th>
                            <th>Station Name</th>
                            <th>Start Time</th>
							<th>End time</th>
							<th>Options</th>	
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
                                <td><a href="stationdetails.php?stationid=<?php echo $row['Station_ID']?>"><?php echo $row['Station_ID']?></a></td>
                                <td><?php echo $row['Station_Name']?></td>
								 <td><?php echo $row['Start_time']?></td>
								<td><?php echo $row['End_time']?></td>
                                <td><p><a href="stationedit.php?station_id=<?php echo $row['Station_ID']?>"><font color="Red">Update</font></a>
								<a href="stationdelete.php?station_id=<?php echo $row['Station_ID']?>"> <font color="Brown">Delete</font></a></p></td>
                            </tr>
                            <?php 
                }    
            ?>
                    </table>
        </body>
        </html>