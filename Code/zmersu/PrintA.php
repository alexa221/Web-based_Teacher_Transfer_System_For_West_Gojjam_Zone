<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM package_tbl WHERE package_id=$id");
	if($del_sql)
		echo "Record Deleted... !";
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="am">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>::.ዓለም አቀፍ ጭነት.::</title>

<script type="text/javascript">

       function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=595,height=842,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>

</head>
<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">ይፈልጉ እና ፕርንት ያድርጉ </td>
		<td> <input type="button" value="ፕርንት" id="button-search" class="btn" onclick="PrintDoc()"/></td>
		<td><input type="text" name="searchtxt" title="ለፍለጋ ሁኔታ ያስገቡ " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="ፈልግ" id="button-search" title="የፍለጋ ጥቅል" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />
<div id="printarea">
<div id="content-input">
<h3 align="center">ወርቃማው አውቶቡስ የትራንስፖርት ስርዓት መጋራት ኩባንያ .</h3>
<p align="center"><strong>ስልክ አ.አ:</strong>+251921955135 +25195432344 +9251123456<br>
<strong>ስልክ ከደብረ ታቦር:</strong> +251972097626 +251901577090 +251953335026<br>
<br><strong><strong>እሜል:</strong>info@goldenbusethiopia.com</p>
	 <table border="1" width="1000px" align="center" cellpadding="5" class="mytable" cellspacing="0" >
        <tr height="35px">
            <th>ተ.ቁ</th>
			<th>መለያ ቁጥር</th>
            <th>ስም</th>
            <th>የአባት ስም</th>
            <th>ስሊክ ቁጥር</th>
            <th>እዲሜ</th>            
            <th>መነሻ ከተማ</th>
            <th> መድረሻ ከተማ</th>
            <th>ታርጋ ቁጥር</th>
            <th>ቀን</th>
            <th>ዋጋ </th>
            <th>የቲኬት መለያ ቁጥር</th>
            
            <th>ሁኔታ</th>
            
        </tr>
         <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SELECT * FROM reservation where status like '%$key%'");
	else
		 $sql_sel=mysql_query("SELECT * FROM reservation where status = 'በጉዞ ላይ'or status='ተሰርዟል'or status='ደርሷል'");
	
		
       
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
			<td><?php echo $row['id'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['telephone'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['depcity'];?></td>
            <td><?php echo $row['descity'];?></td>
            <td><?php echo $row['busid'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['transaction_no'];?></td>
            
           <td><?php echo $row['status'];?></td>
            
            
        </tr>
    <?php	
    }
    ?>
    </table>

</div><!-- end of content-input -->
</div>
</body>
</html>