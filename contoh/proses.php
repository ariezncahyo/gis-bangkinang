<?php

 // Connects to your Database 
 
include'../connect.php';

 $target = "../photo/"; 
 $target = $target . basename( $_FILES['Photo']['name']); 

 
// membaca nama file
$Photo = $_FILES['Photo']['name'];    
  

// membaca nama file temporary
$tmpName  = $_FILES['Photo']['tmp_name'];
 
// membaca size file
$fileSize = $_FILES['Photo']['size'];
 
// membaca tipe file
$fileType = $_FILES['Photo']['type'];
 
$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Address = $_POST["Address"];
$IconID = $_POST["IconID"];



 
// query SQL untuk menyimpan isi file dan informasi lainnya ke database
 
$sql="Update marker set Latitude ='$Latitude',
		Longitude	='$Longitude',
		ZoomLevel	='$ZoomLevel',
		Title		='$Title',
		Photo		='$Photo',
		TextHTML	='$TextHTML',
		Address		='$Address',
		IconID		='$IconID'
		where MarkerID	='$MarkerID'";

mysql_query($sql,$koneksi)
	or die ("SQL Error:".mysql_error());



if(move_uploaded_file($_FILES['Photo']['tmp_name'], $target)) 
 {
 header("Location: tampil.php");
 } 

  
 ?> 




