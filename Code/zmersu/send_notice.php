
<script type="text/javascript">
function timeimgs(numb) {  // Reusable timer
thetimer = setTimeout("imgturn('" +numb+ "')", 3000);
</script>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Golden bus transport system</title>
<meta name="robots" content="index, follow">
  <meta name="keywords" content="goldenbus">
  <meta name="description" content="goldenbus">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/header.css" type="text/css" />
<link href="themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/new.css" rel="stylesheet" />
<script src="js/new.js" type="text/javascript"></script>
<script src="themes/2/js-image-slider.js" type="text/javascript"></script>
<link type="text/css" href="css/menu1.css" rel="stylesheet" />
<link type="text/css" href="css/dropdown_menu.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />

</head>

<body onLoad="timeimgs('1');">
	<div id="top_style">
<div id="top_style_button"> 
       		<form method="post">
    <a href="?tag=view_notice"><input type="button" name="btn_view" title="View notice" value="view_notice" id="button_view" style="width:120px;"  /></a>
                   		</form>
       </div>
   </div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post" action="createnotice.php"bgcolor="#E0E0E0  ">
<br><br>
<table >
 
 <tr>
   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
  <td><input type="text"  name="Day"value="<?php echo date('y-m-d');?>" readonly="true"></td>
 </tr>
            
  <tr><td></td>
 </tr>
 <tr><td></td><td></td></tr>
 <tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title:</td>
  <td><input type="text" required  Pattern="[a-z A-Z]+"  name="Title" size="20"/></td>
 </tr>
 <tr>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;notice:<br></td>
  <td><textarea placeholder="Please Insert Your notice" type="text" name="text" rows="8" cols="20"/></textarea></td>
 </tr>
 <tr><td></td><td></td></tr><tr><td></td><td></td></tr>
 <tr>
  <td></td><td><input type="submit" name="submit" value ="Submit"/>&nbsp; &nbsp; &nbsp; 
  <input type="reset" name="reset" value="Clear"/></td>
 </tr>
</table

</div> 



<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script>
			$('.myDatepicker').each(function() {
			    var minDate = new Date();
			    minDate.setHours(0);
			    minDate.setMinutes(0);
			    minDate.setSeconds(0,0);
			    
			    var $picker = $(this);
			    $picker.datepicker();
			    
			    var pickerObject = $picker.data('datepicker');
			    
			    $picker.on('changeDate', function(ev){
			        if (ev.date.valueOf() < minDate.valueOf()){
			            
			            // Handle previous date
			            alert('You can not select past date.');
			            pickerObject.setValue(minDate);
			            
			            // And this for later versions (in case)
			            ev.preventDefault();
			            return false;
			        }
			    });
			});					
		</script>

</body>
</html>