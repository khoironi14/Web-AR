<!DOCTYPE html>
<html>
<head>
	<title>WEB AR </title>

	<!-- Mengimpor A-Frame dan AR.js library -->
	<script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
	<script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
</head>
<body>
	
<!-- Membuat a-scene untuk rendering VR/AR dengan AR.js -->
<a-scene embedded arjs>
    <a-assets>
		<!-- Mendefinisikan gambar "earth" yang akan digunakan sebagai tekstur -->
		<img id="earth" src="https://softkompnet.com/vr/assets/gambar/bumi.png">
	</a-assets>
	<!-- Membuat marker dengan pola kustom "pattern-Roni.patt" -->
	<a-marker preset="custom" type="pattern" url="https://softkompnet.com/vr/assets/marker/pattern-Roni.patt">

		<!-- Membuat bola (sphere) yang akan digunakan sebagai objek 3D pada marker -->
		<a-sphere position="0.10" material="src:#earth" animation="property:rotation;from:0 0 0;to: 0 0 360; loop:true"></a-sphere>
	</a-marker>

	<!-- Membuat elemen suara (sound) yang akan digunakan untuk memutar suara -->
	<a-sound
		id="textToSpeechSound"
		autoplay="false"
		loop="false"
		volume="1"
	>
	</a-sound>

	<!-- Menambahkan entitas kamera untuk melihat adegan -->
	<a-entity camera></a-entity>
</a-scene>
</body>
</html>

<script>
    // Suara yang akan diputar ketika marker ditemukan
    const soundURL = "https://softkompnet.com/vr/assets/mp3/lagu-anak.mp3";
    let soundEntity;

    // Fungsi untuk memuat suara
    function loadSound() {
      soundEntity = document.getElementById("textToSpeechSound");
      soundEntity.setAttribute("src", soundURL);
      soundEntity.components.sound.stopSound();
    }

    // Fungsi yang dijalankan ketika marker ditemukan
    function onMarkerFound() {
      if (soundEntity) {
      	// Memutar suara ketika marker ditemukan
        soundEntity.components.sound.playSound();
      }
    }

    // Fungsi yang dijalankan ketika marker hilang
    function onMarkerLost() {
      if (soundEntity) {
      	// Menghentikan pemutaran suara ketika marker hilang
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
