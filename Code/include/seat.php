

<!DOCTYPE HTML>

<?php
	

session_start();

	
	$connection = mysql_connect("localhost","root","");
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysql_select_db('goldenbus');
?>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Golden bus transport system</title>
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/css/bootstrap-responsive.css">
	</HEAD>

	<BODY>
		
		
			<div id="welcome1"> <h1 align="center">PLEASE SELECT YOUR SEAT!!!</h1></div>
				<div class="span10">
                 <?php
								include('conection/connect.php');
								$_SESSION['dat'] =  $_POST['dat'] ;
							$_SESSION['depcity'] = $_POST['depcity'] ;
							$_SESSION['descity'] = $_POST['descity'] ;
							
								
								$user_query=mysql_query("select *  from route where depcity='$_SESSION[depcity]' && descity='$_SESSION[descity]'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								$_SESSION['busid']=$row['busid'];

                                   ?>

					<form action="ticketpayment.php? key=<?php echo $_SESSION['busid'];?>" method="POST" onsubmit="return validateCheckBox();">
						<ul class="thumbnails">
						<?php
							$_SESSION['dat'] =  $_POST['dat'] ;
							$_SESSION['depcity'] = $_POST['depcity'] ;
							$_SESSION['descity'] = $_POST['descity'] ;
							

							$query = "select * from seat1 where date = '" .$_SESSION['dat']. "' and depcity = '" . $depcity . "'and descity='".$descity."'";
							$result = mysql_query($query);
							if ( mysql_num_rows($result) == 0 )
							{
								for($i=1; $i<50; $i++)
								{
									echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Available'>";
											echo "<img src='img/available.png' alt='Available Seat'/>";
											echo "<label class='checkbox'>";
												echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
											echo "</label>";
										echo "</a>";
									echo "</li>";								
								}
							}
							else
							{
								$seats = array(0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
								while($row = mysql_fetch_array($result))
								{
									$pnr = explode("-", $row['PNR']);
									$pnr[3] = intval($pnr[3]) - 1;
									$seats[$pnr[3]] = 1;
								}
								for($i=1; $i<50; $i++)
								{
									$j = $i - 1;
									if($seats[$j] == 1)
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Booked'>";
												echo "<img src='img/occupied.png' alt='Booked Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."' disabled/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
									else
									{
										echo "<li class='span1'>";
											echo "<a href='#' class='thumbnail' title='Available'>";
												echo "<img src='img/available.png' alt='Available Seat'/>";
												echo "<label class='checkbox'>";
													echo "<input type='checkbox' name='ch".$i."'/>Seat".$i;
												echo "</label>";
											echo "</a>";
										echo "</li>";
									}
								}									
								
							}
						?>
						
						</ul>
						<center>
						<table id="ttseat" border="0" cellspacing="15px" cellpadding="5">
						<tr><td>
							<label><b>Departure Date:</b></label>
							</td>
							<td>
							<?php
								echo "<input type='text' class='span2' name='dat' value='".$_SESSION['dat'] ."' readonly/>";
								
							?>
							</td><td rowspan="4"> <table style="width: 100%; background:linear-gradient(white,royalblue,green,white); border-radius: 15px" border="0"><tr><td style="color: white"><b><h3>Available Seat:</h3></b></td><td></td><td></td><td></td><td><img width="60px" height="60px" src="img/available.png"/></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td style="color:white"><b><h3>Reserved Seat:</h3></b></td><td></td><td></td><td></td><td><img width="60px" height="60px" src="img/occupied.png"/></td></tr></table></td>
							</tr>
							<tr><td>
							<label style="color:"><b>Departure City:</b></label>
							</td>
							<td>
							<?php
								echo "<input  type='text' class='span2' name='depcity' value='".$depcity ."' readonly/>";
								
							?>
							</td>
							</tr>
							<tr><td>
							<label><b>Destination City:</b></label>
							</td>
							<td>
							<?php
								echo "<input type='text' class='span2' name='descity' value='".$descity ."' readonly/>";
								
							?>
							</td>
							</tr>
								<tr>
	        <td><label for="name">Bus SNo.:</label></td>
            <td><?php
								include('conection/connect.php');
								
								
								$user_query=mysql_query("select *  from route where depcity='$_SESSION[depcity]' && descity='$_SESSION[descity]'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								$_SESSION['busid']=$row['busid'];
								
								 {
							?>
							
								 <?php echo "<input type='text' name='busid' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=".$row['busid']." readonly />";?>
								
							
<?php } ?></td></tr>
			
			
			
<tr>
	        <td><label for="name">price:</label></td>
            <td ><?php
								include('conection/connect.php');
					$user_query=mysql_query("select *  from route where depcity='$_SESSION[depcity]' && descity='$_SESSION[descity]'")or die(mysql_error());
								$row=mysql_fetch_array($user_query);
								 {
								 	
							?>
							
								 <?php echo "<input type='text' name='price' style='width:200px; height: 30px; border-radius: 5px; color: blue; font-size: 15px; border-color:#1ee1dc;' id='input1' class='span3' value=".$row['price']." readonly />";?>
								
							
<?php } ?></td></tr>
							
			





							<tr><td colspan="2">
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./reservation1.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
							</td></tr></table>
						</center>
					</form>
				</div>
			
		

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/js/jquery-latest.min.js">\x3C/script>')</script>
		
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return i;

						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>
	</BODY>
</HTML>