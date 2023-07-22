<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
	<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
</head>
<body>
	
<a-scene embedded arjs>
    <a-assets>
		<img id="earth" src="https://softkompnet.com/vr/assets/gambar/bumi.png">
	</a-assets>
<a-marker preset="custom" type="pattern" url="https://softkompnet.com/vr/assets/marker/pattern-Roni.patt">
<a-sphere position="0.10" material="src:#earth" animation="property:rotation;from:0 0 0;to: 0 0 360; loop:true"></a-sphere>
</a-marker>
 <a-sound
        id="textToSpeechSound"
        autoplay="false"
        loop="false"
        volume="1"
      >
      </a-sound>
<!--Menmabhkan Camera-->
<a-entity camera></a-entity>
</a-scene>
</body>
</html>
  <script>
    // Suara yang akan diputar ketika marker ditemukan
  const soundURL = "https://softkompnet.com/vr/assets/mp3/lagu-anak.mp3";
    let soundEntity;

    function loadSound() {
      soundEntity = document.getElementById("textToSpeechSound");
      soundEntity.setAttribute("src", soundURL);
      soundEntity.components.sound.stopSound();
    }

   

    // Dijalankan ketika marker ditemukan
    function onMarkerFound() {
      if (soundEntity) {
      	
        soundEntity.components.sound.playSound();
      }
    }

    // Dijalankan ketika marker hilang
    function onMarkerLost() {
      if (soundEntity) {
        soundEntity.components.sound.stopSound();
      }
    }

    // Daftarkan event listener untuk event marker found dan marker lost
    const marker = document.querySelector("a-marker");
    marker.addEventListener("markerFound", onMarkerFound);
    marker.addEventListener("markerLost", onMarkerLost);

    // Panggil fungsi untuk memuat suara
   
    loadSound();
  </script>