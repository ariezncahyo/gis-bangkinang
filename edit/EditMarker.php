<?php
include "connect.php";

# baca variabel URL (if register global on)
$edit = (int) $_GET['MarkerID'];

 # Penyimpanan
 $sql = "select * from marker where MarkerID ='$edit'"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
$data=mysql_fetch_array($qry);
?>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="./sidebar/includes.js"></script>
		<!-- saved from url=(0014)about:internet -->
		<!-- script type="text/javascript" src="sidebar/html.js"></script-->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="./edit.js"></script>
<script type="text/javascript" src="../icon.js.php"></script>
<script type="text/javascript">
<!--
function initialize() {
  //set map untuk senternya di Bangkinang ... asli ... wajib tio ... horam kok indak
  //GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>)
  //latLng = new google.maps.LatLng(0.3326417,101.02427310000007);
  latLng = new google.maps.LatLng(<?php echo $data['Latitude'].','. $data['Longitude'];?>);
  map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: <?php echo $data['ZoomLevel'];?>,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  marker = new google.maps.Marker({
    position: latLng,
    title: '<?php echo $data["Title"];?>',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  updateZoomLevelStatus(map.zoom);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Sedang digeser...!!!');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Sedang digeser...!!!');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
    updateZoomLevelStatus(map.zoom);
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
//-->
</script>
</head>
<body onunload="GUnload()">
  <style>
  #mapCanvas {
    width: 1500px;
    height: 700px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>

  <div id="mapCanvas"></div>
  
  <div id="infoPanel">

<div id="tempStorage" style="display:none;"></div>
	<div id="sideBar">
		<a href="#" id="sideBarTab"><img src="sidebar/assets/spacer.gif" alt="" title=""/></a>
		<div id="sideBarContents" style="display:none;">
			<div id="sideBarContentsInner">
				<div id="scrollbar_container">
					<div id="scrollbar_content">



 
 <!-- Style Form Add Marker 
 6/17/2012 12:18:13 PM -->
 <STYLE>
  BODY {
    font-family: Verdana, sans-serif;
    font-size: 11pt;
  }
	
  #Marker {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: 400px;
    margin: auto;
    padding: 2px;	
    text-align: center;
    background:#99ffcc;
	border: 5px solid teal; 
    color: white;
    /*background-image: url(../admin/peta.jpg);*/
  }
  #Judul {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 11pt;
    text-align: center;
    background-color: #006633;
    border: 2px solid #ffffff; 
    color: white;
    padding: 4px;
    font-weight:bold;
  }
  .inp {
    font-size: 11pt;
    text-align: left;
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 2px;
  }
  .btn{
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 4px;
    font-weight: bold;
   background-color:#f2f2f2;
  }
  label {
	font-size: 11pt;
    color: #000000;
    font-style: ;
  }
	
  </STYLE>
 
  </HEAD>


<BODY>


  <DIV ID='Marker'>
    <DIV ID='Judul'>
   Edit Marker
    </DIV>
    
  
  <p>
  <table>

		<tr>
			<td width="112"><label>MarkerID</label>
			<td width="677">
			<input type="hidden" name="MarkerID" id="MarkerID" value="<? echo $data['MarkerID'];?>"/>
			<font face="Comic Sans MS" size="2">: <? echo $data['MarkerID'];?></font>
			</td>
		</tr>
</tr>
	
<tr>
			<td width="112"><label>Latitude </label></td>
			<td width="677">
		<input class="inp" name="Latitude" id="Latitude" type=text size=20 value="<?= $data ['Latitude']; ?>"><br/>
			
</tr>
 
<tr>
			<td width="112"><label>Longitude </label></td>
			<td width="677">
		<input class="inp" name="Longitude" id="Longitude" type=text size=20 value="<?= $data ['Longitude']; ?>"><br/>
			
</tr>


<tr>
			<td width="112"><label>ZoomLevel </label></td>
			<td width="677">
		<input class="inp" name="ZoomLevel" id="ZoomLevel" type=text size=1 value="<?= $data ['ZoomLevel']; ?>"><br/>
			
			
</tr>

<tr>
		
			<td width="112"><label>Title </label></td>
			<td width="677">
			<input class="inp" name="Title" id="Title" type=text size=42 value="<?= $data ['Title']; ?>"><br/>
			<div id="markerStatus"> <label><i>Click and drag the marker.</i></div>
			
</tr>


<tr>
			<td width="112"><label>TextHTML </label></td>
			<td width="677">
			<textarea class="inp" name="" rows=8 cols=33 id="TextHTML"><?= $data ['TextHTML']; ?></textarea ><br/>
			
</tr>


<tr>
			<td width="112"><label>Address </label></td>
			<td width="677">
		    <textarea class="inp"  rows=2 cols=33 name="Address" id="Address"><?= $data ['Address']; ?>"></textarea><br/>
		
</tr>

<tr>
			<td width="112"><label>TypeID </label></td>
			<td width="677">
			<select name="TypeID" id="TypeID" onchange="handleMarkerIcon(this)">
	<?php
	include "connect.php";
	$sql = "SELECT * FROM  `type` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		//$no++;
		?>
		<option value="<?php echo $data['TypeID'];?>"><?php echo $data['TypeName'];?></option>
		
	<?php
	}
	?>
	</select>

<tr>
		<td colspan="2"><center> <input class="inp" type="button"  value="Simpan" onclick="simpanMarker()"></td>

</table>

  </DIV>
	
<tr>
	<tr align="right" bgcolor="#D5EDB3">
		<td><a href="viewMap.php"><center>Exit</td>
</tr>
</body>
</html>