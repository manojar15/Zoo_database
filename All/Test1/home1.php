<html>
<body>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "Test1";
        $dbconn = mysqli_connect($host,$user,$pass,$db) or die("Could not connect to database!");   

        $query="SELECT * FROM Assigned NATURAL JOIN Staff NATURAL JOIN Animal";
        $result=mysqli_query($dbconn,$query);
       // $rownum=mysqli_num_rows($result);
    ?>
	  <!DOCTYE HTML>
        <html>
        <head>
            <meta charset="utf-8">
            <title> Home page</title>
            <link href="asset/css/main.css" rel="stylesheet" type="text/css">
        </head>
        <body>
		<style>
		body{
			box-shadow:inset 0 0 0 100vw rgba(0,0,0,0.5);
			background-image:url("back10.jpg");
			background-blend-mode:screen,difference,lighten;
			background-repeat:no-repeat;
			background-size:100% 100%;
		    }
		</style>
            <h1 style="color:Blue" align="center">USER Home</h1>
			<br>
			<br>
			<br>
            <div class="row">
			 <div class="col-3" style="background-color:white;">
              </div>
            </div>
			<table>
			<style>
			table{
				border:1px solid black;
				border-collapse:collapse;
				width:100%;
				background-color:white;
				text-align:center;
				border-spacing:15px;
			}
			tr,td{
				border:1px solid black;
				border-collapse:collapse;
				padding:25px;
			}
			a{
				text-decoration:none;
			}
			
			</style>		
			<tr>
			            <td><h2>Home<h2></li>
                        <td><h2><a href="cage1.php">Cage</a></h2></td>
                        <td><h2><a href="animal1.php">Animal</a></h2></td>
                        <td><h2><a href="animalclass1.php">Animal Class</a></h2></td>
                        <td><h2><a href="staff1.php">Staff</a></h2></td>
                        <td><h2><a href="shift1.php">Shift</a></h2></td>
						<td><h2><a href="index.php">Login</a></h2></td>
			
			</tr>
			</table>
        </body>
        </html>