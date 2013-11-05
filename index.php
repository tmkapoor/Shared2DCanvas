<?php
	$lengthOfID = 8;
	if(!isset($_GET['room'])){
		die("<h2>Please mention a room name as a GET variable then reload page.</h2>");
	}
	else{
		$room = $_GET['room'];
		$charSet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $lengthOfID; $i++) {
            $randomString .= $charSet[rand(0, strlen($charSet) - 1)];
        }
		$id = $randomString;
	}	
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
		var myColor = null;
		var myRoom = "<?php print $room; ?>";
		var myID = "<?php print $id; ?>";
		var drawMode = "free";
		var brushSize = 3;
		//var serverAddress = "192.168.1.3";
		var serverAddress = "arbiter";
	</script>
	<title>Shared canvas</title>
</head>
	<body>
		<div id="canvasHolder" >
			<article>
				<!-- our canvas will be inserted here-->
			</article>
		</div>
		<div class="row-fluid">
			<div class="span4 offset1">
				<table class="swatches">
					 <tbody>
					 <tr><td class="swatch" bgcolor="#F5A9A9"></td><td class="swatch" bgcolor="#F5BCA9"></td><td class="swatch" bgcolor="#F5D0A9"></td><td class="swatch" bgcolor="#F3E2A9"></td><td class="swatch" bgcolor="#F2F5A9"></td><td class="swatch" bgcolor="#E1F5A9"></td><td class="swatch" bgcolor="#D0F5A9"></td><td class="swatch" bgcolor="#BCF5A9"></td><td class="swatch" bgcolor="#A9F5A9"></td><td class="swatch" bgcolor="#A9F5BC"></td><td class="swatch" bgcolor="#A9F5D0"></td><td class="swatch" bgcolor="#A9F5E1"></td><td class="swatch" bgcolor="#A9F5F2"></td><td class="swatch" bgcolor="#A9E2F3"></td><td class="swatch" bgcolor="#A9D0F5"></td><td class="swatch" bgcolor="#A9BCF5"></td><td class="swatch" bgcolor="#A9A9F5"></td><td class="swatch" bgcolor="#BCA9F5"></td><td class="swatch" bgcolor="#D0A9F5"></td><td class="swatch" bgcolor="#E2A9F3"></td><td class="swatch" bgcolor="#F5A9F2"></td><td class="swatch" bgcolor="#F5A9E1"></td><td class="swatch" bgcolor="#F5A9D0"></td><td class="swatch" bgcolor="#F5A9BC"></td><td class="swatch" bgcolor="#E6E6E6"></td></tr>
					 <tr><td class="swatch" bgcolor="#F78181"></td><td class="swatch" bgcolor="#F79F81"></td><td class="swatch" bgcolor="#F7BE81"></td><td class="swatch" bgcolor="#F5DA81"></td><td class="swatch" bgcolor="#F3F781"></td><td class="swatch" bgcolor="#D8F781"></td><td class="swatch" bgcolor="#BEF781"></td><td class="swatch" bgcolor="#9FF781"></td><td class="swatch" bgcolor="#81F781"></td><td class="swatch" bgcolor="#81F79F"></td><td class="swatch" bgcolor="#81F7BE"></td><td class="swatch" bgcolor="#81F7D8"></td><td class="swatch" bgcolor="#81F7F3"></td><td class="swatch" bgcolor="#81DAF5"></td><td class="swatch" bgcolor="#81BEF7"></td><td class="swatch" bgcolor="#819FF7"></td><td class="swatch" bgcolor="#8181F7"></td><td class="swatch" bgcolor="#9F81F7"></td><td class="swatch" bgcolor="#BE81F7"></td><td class="swatch" bgcolor="#DA81F5"></td><td class="swatch" bgcolor="#F781F3"></td><td class="swatch" bgcolor="#F781D8"></td><td class="swatch" bgcolor="#F781BE"></td><td class="swatch" bgcolor="#F7819F"></td><td class="swatch" bgcolor="#D8D8D8"></td></tr>
					 <tr><td class="swatch" bgcolor="#FA5858"></td><td class="swatch" bgcolor="#FA8258"></td><td class="swatch" bgcolor="#FAAC58"></td><td class="swatch" bgcolor="#F7D358"></td><td class="swatch" bgcolor="#F4FA58"></td><td class="swatch" bgcolor="#D0FA58"></td><td class="swatch" bgcolor="#ACFA58"></td><td class="swatch" bgcolor="#82FA58"></td><td class="swatch" bgcolor="#58FA58"></td><td class="swatch" bgcolor="#58FA82"></td><td class="swatch" bgcolor="#58FAAC"></td><td class="swatch" bgcolor="#58FAD0"></td><td class="swatch" bgcolor="#58FAF4"></td><td class="swatch" bgcolor="#58D3F7"></td><td class="swatch" bgcolor="#58ACFA"></td><td class="swatch" bgcolor="#5882FA"></td><td class="swatch" bgcolor="#5858FA"></td><td class="swatch" bgcolor="#8258FA"></td><td class="swatch" bgcolor="#AC58FA"></td><td class="swatch" bgcolor="#D358F7"></td><td class="swatch" bgcolor="#FA58F4"></td><td class="swatch" bgcolor="#FA58D0"></td><td class="swatch" bgcolor="#FA58AC"></td><td class="swatch" bgcolor="#FA5882"></td><td class="swatch" bgcolor="#BDBDBD"></td></tr>
					 <tr><td class="swatch" bgcolor="#FE2E2E"></td><td class="swatch" bgcolor="#FE642E"></td><td class="swatch" bgcolor="#FE9A2E"></td><td class="swatch" bgcolor="#FACC2E"></td><td class="swatch" bgcolor="#F7FE2E"></td><td class="swatch" bgcolor="#C8FE2E"></td><td class="swatch" bgcolor="#9AFE2E"></td><td class="swatch" bgcolor="#64FE2E"></td><td class="swatch" bgcolor="#2EFE2E"></td><td class="swatch" bgcolor="#2EFE64"></td><td class="swatch" bgcolor="#2EFE9A"></td><td class="swatch" bgcolor="#2EFEC8"></td><td class="swatch" bgcolor="#2EFEF7"></td><td class="swatch" bgcolor="#2ECCFA"></td><td class="swatch" bgcolor="#2E9AFE"></td><td class="swatch" bgcolor="#2E64FE"></td><td class="swatch" bgcolor="#2E2EFE"></td><td class="swatch" bgcolor="#642EFE"></td><td class="swatch" bgcolor="#9A2EFE"></td><td class="swatch" bgcolor="#CC2EFA"></td><td class="swatch" bgcolor="#FE2EF7"></td><td class="swatch" bgcolor="#FE2EC8"></td><td class="swatch" bgcolor="#FE2E9A"></td><td class="swatch" bgcolor="#FE2E64"></td><td class="swatch" bgcolor="#A4A4A4"></td></tr>
					 <tr><td class="swatch" bgcolor="#FF0000"></td><td class="swatch" bgcolor="#FF4000"></td><td class="swatch" bgcolor="#FF8000"></td><td class="swatch" bgcolor="#FFBF00"></td><td class="swatch" bgcolor="#FFFF00"></td><td class="swatch" bgcolor="#BFFF00"></td><td class="swatch" bgcolor="#80FF00"></td><td class="swatch" bgcolor="#40FF00"></td><td class="swatch" bgcolor="#00FF00"></td><td class="swatch" bgcolor="#00FF40"></td><td class="swatch" bgcolor="#00FF80"></td><td class="swatch" bgcolor="#00FFBF"></td><td class="swatch" bgcolor="#00FFFF"></td><td class="swatch" bgcolor="#00BFFF"></td><td class="swatch" bgcolor="#0080FF"></td><td class="swatch" bgcolor="#0040FF"></td><td class="swatch" bgcolor="#0000FF"></td><td class="swatch" bgcolor="#4000FF"></td><td class="swatch" bgcolor="#8000FF"></td><td class="swatch" bgcolor="#BF00FF"></td><td class="swatch" bgcolor="#FF00FF"></td><td class="swatch" bgcolor="#FF00BF"></td><td class="swatch" bgcolor="#FF0080"></td><td class="swatch" bgcolor="#FF0040"></td><td class="swatch" bgcolor="#848484"></td></tr>
					 <tr><td class="swatch" bgcolor="#DF0101"></td><td class="swatch" bgcolor="#DF3A01"></td><td class="swatch" bgcolor="#DF7401"></td><td class="swatch" bgcolor="#DBA901"></td><td class="swatch" bgcolor="#D7DF01"></td><td class="swatch" bgcolor="#A5DF00"></td><td class="swatch" bgcolor="#74DF00"></td><td class="swatch" bgcolor="#3ADF00"></td><td class="swatch" bgcolor="#01DF01"></td><td class="swatch" bgcolor="#01DF3A"></td><td class="swatch" bgcolor="#01DF74"></td><td class="swatch" bgcolor="#01DFA5"></td><td class="swatch" bgcolor="#01DFD7"></td><td class="swatch" bgcolor="#01A9DB"></td><td class="swatch" bgcolor="#0174DF"></td><td class="swatch" bgcolor="#013ADF"></td><td class="swatch" bgcolor="#0101DF"></td><td class="swatch" bgcolor="#3A01DF"></td><td class="swatch" bgcolor="#7401DF"></td><td class="swatch" bgcolor="#A901DB"></td><td class="swatch" bgcolor="#DF01D7"></td><td class="swatch" bgcolor="#DF01A5"></td><td class="swatch" bgcolor="#DF0174"></td><td class="swatch" bgcolor="#DF013A"></td><td class="swatch" bgcolor="#6E6E6E"></td></tr>
					 <tr><td class="swatch" bgcolor="#B40404"></td><td class="swatch" bgcolor="#B43104"></td><td class="swatch" bgcolor="#B45F04"></td><td class="swatch" bgcolor="#B18904"></td><td class="swatch" bgcolor="#AEB404"></td><td class="swatch" bgcolor="#86B404"></td><td class="swatch" bgcolor="#5FB404"></td><td class="swatch" bgcolor="#31B404"></td><td class="swatch" bgcolor="#04B404"></td><td class="swatch" bgcolor="#04B431"></td><td class="swatch" bgcolor="#04B45F"></td><td class="swatch" bgcolor="#04B486"></td><td class="swatch" bgcolor="#04B4AE"></td><td class="swatch" bgcolor="#0489B1"></td><td class="swatch" bgcolor="#045FB4"></td><td class="swatch" bgcolor="#0431B4"></td><td class="swatch" bgcolor="#0404B4"></td><td class="swatch" bgcolor="#3104B4"></td><td class="swatch" bgcolor="#5F04B4"></td><td class="swatch" bgcolor="#8904B1"></td><td class="swatch" bgcolor="#B404AE"></td><td class="swatch" bgcolor="#B40486"></td><td class="swatch" bgcolor="#B4045F"></td><td class="swatch" bgcolor="#B40431"></td><td class="swatch" bgcolor="#585858"></td></tr>
					 <tr><td class="swatch" bgcolor="#8A0808"></td><td class="swatch" bgcolor="#8A2908"></td><td class="swatch" bgcolor="#8A4B08"></td><td class="swatch" bgcolor="#886A08"></td><td class="swatch" bgcolor="#868A08"></td><td class="swatch" bgcolor="#688A08"></td><td class="swatch" bgcolor="#4B8A08"></td><td class="swatch" bgcolor="#298A08"></td><td class="swatch" bgcolor="#088A08"></td><td class="swatch" bgcolor="#088A29"></td><td class="swatch" bgcolor="#088A4B"></td><td class="swatch" bgcolor="#088A68"></td><td class="swatch" bgcolor="#088A85"></td><td class="swatch" bgcolor="#086A87"></td><td class="swatch" bgcolor="#084B8A"></td><td class="swatch" bgcolor="#08298A"></td><td class="swatch" bgcolor="#08088A"></td><td class="swatch" bgcolor="#29088A"></td><td class="swatch" bgcolor="#4B088A"></td><td class="swatch" bgcolor="#6A0888"></td><td class="swatch" bgcolor="#8A0886"></td><td class="swatch" bgcolor="#8A0868"></td><td class="swatch" bgcolor="#8A084B"></td><td class="swatch" bgcolor="#8A0829"></td><td class="swatch" bgcolor="#424242"></td></tr>
					 <tr><td class="swatch" bgcolor="#610B0B"></td><td class="swatch" bgcolor="#61210B"></td><td class="swatch" bgcolor="#61380B"></td><td class="swatch" bgcolor="#5F4C0B"></td><td class="swatch" bgcolor="#5E610B"></td><td class="swatch" bgcolor="#4B610B"></td><td class="swatch" bgcolor="#38610B"></td><td class="swatch" bgcolor="#21610B"></td><td class="swatch" bgcolor="#0B610B"></td><td class="swatch" bgcolor="#0B6121"></td><td class="swatch" bgcolor="#0B6138"></td><td class="swatch" bgcolor="#0B614B"></td><td class="swatch" bgcolor="#0B615E"></td><td class="swatch" bgcolor="#0B4C5F"></td><td class="swatch" bgcolor="#0B3861"></td><td class="swatch" bgcolor="#0B2161"></td><td class="swatch" bgcolor="#0B0B61"></td><td class="swatch" bgcolor="#210B61"></td><td class="swatch" bgcolor="#380B61"></td><td class="swatch" bgcolor="#4C0B5F"></td><td class="swatch" bgcolor="#610B5E"></td><td class="swatch" bgcolor="#610B4B"></td><td class="swatch" bgcolor="#610B38"></td><td class="swatch" bgcolor="#610B21"></td><td class="swatch" bgcolor="#2E2E2E"></td></tr>
					 <tr><td class="swatch" bgcolor="#3B0B0B"></td><td class="swatch" bgcolor="#3B170B"></td><td class="swatch" bgcolor="#3B240B"></td><td class="swatch" bgcolor="#3A2F0B"></td><td class="swatch" bgcolor="#393B0B"></td><td class="swatch" bgcolor="#2E3B0B"></td><td class="swatch" bgcolor="#243B0B"></td><td class="swatch" bgcolor="#173B0B"></td><td class="swatch" bgcolor="#0B3B0B"></td><td class="swatch" bgcolor="#0B3B17"></td><td class="swatch" bgcolor="#0B3B24"></td><td class="swatch" bgcolor="#0B3B2E"></td><td class="swatch" bgcolor="#0B3B39"></td><td class="swatch" bgcolor="#0B2F3A"></td><td class="swatch" bgcolor="#0B243B"></td><td class="swatch" bgcolor="#0B173B"></td><td class="swatch" bgcolor="#0B0B3B"></td><td class="swatch" bgcolor="#170B3B"></td><td class="swatch" bgcolor="#240B3B"></td><td class="swatch" bgcolor="#2F0B3A"></td><td class="swatch" bgcolor="#3B0B39"></td><td class="swatch" bgcolor="#3B0B2E"></td><td class="swatch" bgcolor="#3B0B24"></td><td class="swatch" bgcolor="#3B0B17"></td><td class="swatch" bgcolor="#1C1C1C"></td></tr>
					 <tr><td class="swatch" bgcolor="#2A0A0A"></td><td class="swatch" bgcolor="#2A120A"></td><td class="swatch" bgcolor="#2A1B0A"></td><td class="swatch" bgcolor="#29220A"></td><td class="swatch" bgcolor="#292A0A"></td><td class="swatch" bgcolor="#222A0A"></td><td class="swatch" bgcolor="#1B2A0A"></td><td class="swatch" bgcolor="#122A0A"></td><td class="swatch" bgcolor="#0A2A0A"></td><td class="swatch" bgcolor="#0A2A12"></td><td class="swatch" bgcolor="#0A2A1B"></td><td class="swatch" bgcolor="#0A2A22"></td><td class="swatch" bgcolor="#0A2A29"></td><td class="swatch" bgcolor="#0A2229"></td><td class="swatch" bgcolor="#0A1B2A"></td><td class="swatch" bgcolor="#0A122A"></td><td class="swatch" bgcolor="#0A0A2A"></td><td class="swatch" bgcolor="#120A2A"></td><td class="swatch" bgcolor="#1B0A2A"></td><td class="swatch" bgcolor="#220A29"></td><td class="swatch" bgcolor="#2A0A29"></td><td class="swatch" bgcolor="#2A0A22"></td><td class="swatch" bgcolor="#2A0A1B"></td><td class="swatch" bgcolor="#2A0A12"></td><td class="swatch" bgcolor="#151515"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="span2">
				<div class="row-fluid">
					<div class="row-fuild">
						<button id="freeDraw" class="side_1em span5 offset1 setMode btn " destination="free">Freehand</button>
						<button id="lineDraw" class="side_1em span5 offset1 setMode btn btn-inverse" destination="line">Line</button>
					</div>
					<div class="row-fuild">
						<button id="rectDraw" class="side_1em span5 offset1 setMode btn btn-inverse" destination="fill">Fill</button>
						<button id="circleDraw" class="side_1em span5 offset1 setMode btn btn-inverse"  destination="fan">Fan</button>
					</div>
				</div>
			</div>
			<div class="span2">
				<h6 style="text-align: center;">Color</h6>
				<div id="myColor" class="side_1em" style='width: 2em; height: 2em;'></div>
			</div>
			<div class="span2">
				<h6 style="text-align: center; ">Brush size</h6>
				<div class="row-fluid" >
					<button id="decBrush" class="btn btn-inverse span3 offset1"> - </button>
					<div class=" span3 offset1" >		<div id="brushSize" style='width: 2em; height: 2em;'></div>	</div>
					<button id="incBrush" class="btn btn-inverse span3 offset1"> + </button>
				</div>
			</div>	
		</div>

		<!-- Java script -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.event.drag-2.0.js"></script>
		<script src="http://arbiter:4000/socket.io/socket.io.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
	</body>
</html>
