<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
</head>

<body>
    <div id="reader" style="width: 100%; max-width: 500px;"></div>

    <form id="absenForm" method="POST">
    @csrf
    <input type="hidden" name="nim" id="nim">

</form>

<div id="reader" style="width: 300px;"></div> <!-- Area scanner -->

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    function onScanSuccess(decodedText) {
    console.log("QR Code terbaca:", decodedText);

    if (decodedText) {
        let form = document.getElementById('absenForm');
        form.action = "/absent/" + decodedText; // Set URL dengan NIM
        form.submit(); // Submit otomatis
    } else {
        console.error("QR Code tidak berisi data.");
    }
}

    function onScanError(errorMessage) {
        console.warn("Error scanning:", errorMessage);
    }

    Html5Qrcode.getCameras().then(devices => {
        if (devices.length > 0) {
            let cameraId = devices[0].id; // Pilih kamera pertama
            let scanner = new Html5Qrcode("reader");

            scanner.start(cameraId, { fps: 5, qrbox: 250 }, onScanSuccess, onScanError)
                .catch(err => console.error("Gagal memulai scanner:", err));
        } else {
            console.error("Tidak ada kamera yang tersedia.");
        }
    }).catch(err => console.error("Gagal mendeteksi kamera:", err));
</script>





</body>

</html>