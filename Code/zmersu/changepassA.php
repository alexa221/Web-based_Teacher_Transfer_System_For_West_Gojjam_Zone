<?php


$connection = mysql_connect("localhost","root","");
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('goldenbus');
?>
<div class="modal-header">
		<center><font  class="" id="inde_admin_signup">የይለፍ ቃል መቀየርያ ቅጽ </font></center>
    </div>
<div class="navbar-inner">


						<?php
  	
if (isset($_POST['change_password'])) 
  	{	
	
		$username = $_POST['username'];	
		$priv_password = $_POST['priv_password'];	
		$new_password = $_POST['new_password'];
		$compsswd = $_POST['compsswd'];
		
	$resulsasst = mysql_query("SELECT * FROM user WHERE username = '$username'  and   password='$priv_password' ");
	$counssst=mysql_num_rows($resulsasst);
		if($counssst == 0){
		echo '<div class="alert alert-dismissable alert-error"><strong>';
			echo "ክዋኔው አልተሳካም እባክዎን መረጃዎን በትክክል ያስገቡ! ";
			echo'<meta content="5;mainA.php?tag=chpassA.php" http-equiv="refresh" />';
			echo '</strong></div>';
		} else{
		
		$passw=$new_password;
	if(strlen($passw) <=4 || strlen($passw)>10){
	 echo '<div class="alert alert-dismissable alert-e">';
		die( '<strong>'."የይለፍ ቃል ከ 6 እስከ 10 ቁምፊዎች መሆን አለበት!".'</strong>');
		echo'<meta content="5;mainA.php?tag=chpassA.php" http-equiv="refresh" />';
		echo '</div>';}
		
	if (substr($new_password,0,5) == substr($username,0,5)){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("የይለፍ ቃልዎ ከእርስዎ የተጠቃሚ ስም የተለየ መሆን አለበት ፣ ሌላ የይለፍ ቃል ይሞክሩ!");
		echo'<meta content="5;mainA.php?tag=chpassA" http-equiv="refresh" />';
		echo '</strong></div>';
	}
		
		if($new_password == $username){
	echo '<div class="alert alert-dismissable alert-error"><strong>';
		die("Your Pasword Must Not Be The Same With Your Username,Try Other Password");
	echo'<meta content="5;mainA.php?tag=chpassA" http-equiv="refresh" />';
		echo '</strong></div>';
	}
		
		$chack = mysql_query("UPDATE user SET password='$new_password' WHERE username = '$username'    ");
		echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo '<font color="red" size="3">'."በትክክል ተቀይሯል!&nbsp;&nbsp;".'<font style="background-color:#fff;" color="#000" size="3">'."&nbsp;".$new_password."&nbsp;".'</font>'."&nbsp;&nbsp;ይሂ አዲሱ የሚስጥር ቁጥሩዋ ነው ".'<br>'.'</font>';
			echo'<meta content="5;mainA.php?tag=homeA" http-equiv="refresh" />';
		echo '</strong></div>';
		}
		
			
	}
		?>
		
<!--table border="0" cellpadding="10" cellspacing="0"-->
<head>
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />
</head>

	    
            
<div id="style_informations">			 
	<form method="POST" action="">
	   <div>
	  <table border="0" cellpadding="4" cellspacing="0">
	   <tr><td colspan="2">  <img height="150" width="400px" src="picture/admin.png"/>  </td>   </tr>  
	<tr>
			<td style="color: black;"><b>የተጠቃሚ ስም</b></td>
			<td>
                	<input type="text" style="color: blue" name="username" pattern="[ሀ-ፐ ]{2,10}" title="እባክዎ ትክክለኛ ስም ያስገቡ." id="textbox" required="required"/>
                </td>
            </tr>
			<tr>
			<td style="color: black;"><b>የአሁኑ ሚስጥራዊ ማለፊያ ቁልፍ </b></td>
			<td>
                	<input type="password" style="color: blue" name="priv_password"  title="እባክዎ ትክክለኛ ሚስጥራዊ ማለፊያ ቁልፍ ያስገቡ." id="textbox" required="required"/>
                </td>
            </tr>
			<tr>
			<td style="color: black;"><b>አዲስ የይለፍ ቃል </b></td>
			<td>
                	<input type="password" style="color: blue" name="new_password"  title="እባክዎ ትክክለኛ አዲስ የሚጥር ቁልፍ ያስገቡ ." id="textbox" required="required"/>
                </td>
            </tr>
			<tr>
			<td style="color: black;"><b>የይለፍ ቃል አረጋግጥ </b></td>
			<td>
                	<input type="password" style="color: blue" name="compsswd"  title="እባክዎ ትክክለኛ አዲስ የሚጥር ቁልፍ ያስገቡ." id="textbox" required="required"/>
                </td>
            </tr>
<tr>
                <td colspan="2">
                	<input type="reset" value="ሰርዝ" id="button-in"/>
                	<input type="submit" name="change_password" value="ቀይር" id="button-in"  />
                </td>
            </tr>
			</table>
			</div>
</form>
</div>