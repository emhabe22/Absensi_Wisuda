<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
</head>
<body>
    <video id="preview" width="100%"></video>

    <form id="absenForm" action="/absent" method="POST">
        @csrf
        <input type="hidden" name="nim" id="nim">
    </form>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            document.getElementById('nim').value = content; // QR berisi NIM mahasiswa
            document.getElementById('absenForm').submit(); // Kirim otomatis ke backend
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('Kamera tidak ditemukan!');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
</body>
</html>
