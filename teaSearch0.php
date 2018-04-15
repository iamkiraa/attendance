<?php
include('check_teacher.php'); //check if user if an administrator
include('header_teacher.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/tambahkenderaan.css">
		<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<header>

			
			 <p align="center"><img src="image/logo.png"  style="width:1200px;height:100px;border:0;">
             <p align="justify">&nbsp;</p>
			          

</header>
<?php
/* includ db connection file*/
include("connection.php");

/* capture number */
$number = $_POST['number'];

/* execute SQL statement */
$sql = "SELECT * FROM pemohon 
	WHERE pemohonnumber = $number";
$query = mysql_query($sql) or die ("Error: " . mysql_error());
$row = mysql_num_rows($query);
if($row == 0){
	echo "No record found";
	echo "<br><a href='menuAdmin.php'>Back</a>";
}
else{
	$r = mysql_fetch_assoc($query);
	$pemohonname = $r['pemohonname'];
	$pemohonnumber = $r['pemohonnumber'];
	$pemohonusername = $r['pemohonusername'];
	$pemohonpassword = $r['pemohonpassword'];
?>
<html>
<style type="text/css">
body {
	background-color: #FFF;
}
body,td,th {
	color: #000;
}
</style>
<body>
<form name="form" method="post" action="process0.php">
<table align="center">
    <tr valign="baseline">
<br>
<br>
<br>
<table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nama:</td>
      <td><input type="text" name="name" size="45" value="<?php echo $pemohonname ?>"</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Nombor Kad Pengenalan Pemohon:</td>
      <td><input type="text" name="num" size="45" value="<?php echo $pemohonnumber ?>"</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">ID Pengguna:</td>
      <td><input type="text" name="username" size="45" value="<?php echo $pemohonusername ?>"</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Kata Laluan:</td>
      <td><input type="password" name="password" size="45" value="<?php echo $pemohonpassword ?>"</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="Update" value="KEMASKINI" onClick = "return confirm ('Anda pasti ingin mengemaskini data?')">&nbsp;&nbsp;<input type="submit" name="Delete" value="PADAM REKOD" onClick = "return confirm ('Anda pasti ingin memadam data?')"></td>
    </tr>
  </table>
</table>
</form>
<br>
<br>
<br>
<br>
<p align="center"><font color=black size='4pt'><button class="back" onClick="goBack()">KEMBALI</button></font></p>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>
<?php
}
mysql_close($connection);
?>