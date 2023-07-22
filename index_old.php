<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
	<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
</head>
<body>
<a-scene embedded arjs>
<a-marker preset="hiro">
	<!--Membuat Objek kotak  -->
	<a-entity geometry="primitive: box" material="color:red" position="0 0.5 0" animation="property:rotation;from:0 0 0; to:360 0 0; dur:3000; loop:true"></a-entity>
	<a-box material="color:yellow" position="1 1.5 1" animation="property:rotation; from 0 0 0; to: 0 360 360; dur:1000"></a-box>
</a-marker>
<!--Menmabhkan Camera-->
<a-entity camera></a-entity>
</a-scene>
</body>
</html>