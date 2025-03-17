<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <style>
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
        }

        .modal img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Warna utama ITN Malang */
        :root {
            --primary-color: #002147;
            /* Biru tua */
            --accent-color: #c89c00;
            /* Emas */
            --text-light: #ffffff;
        }

        /* Background dengan elemen dekoratif */
        body {
            background: linear-gradient(135deg, #001a33 20%, #002147 80%);
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Elemen dekoratif */
        .bg-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
        }

        .circle1 {
            width: 200px;
            height: 200px;
            background: var(--accent-color);
            top: -50px;
            left: -50px;
        }

        .circle2 {
            width: 150px;
            height: 150px;
            background: var(--accent-color);
            bottom: -50px;
            right: -50px;
        }

        .line {
            width: 120px;
            height: 5px;
            background: var(--accent-color);
            position: absolute;
            top: 30%;
            left: 10%;
            transform: rotate(-45deg);
        }

        /* Container utama */
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 600px;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        /* Judul */
        h1 {
            color: var(--accent-color);
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Area scanner */
        #reader {
            border: 3px solid var(--accent-color);
            border-radius: 12px;
            padding: 15px;
            width: 100%;
            max-width: 380px;
            /* Lebih seimbang */
            height: 380px;
            /* Menyesuaikan */
            margin: auto;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Dekorasi elemen agar tidak terlihat kosong */
        .decoration {
            margin-top: 20px;
            font-size: 16px;
            color: var(--primary-color);
            font-weight: bold;
        }

        /* Tombol */
        .btn-absen {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-absen:hover {
            background-color: #a07c00;
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <!-- Elemen dekoratif -->
    <div class="bg-element circle1"></div>
    <div class="bg-element circle2"></div>
    <div class="bg-element line"></div>

    <div class="container">
        <h1>Scan Untuk Absen</h1>
        <div id="reader"></div>
        <p class="decoration">Arahkan QR Code ke dalam area scanner</p>
    </div>

    <form id="absenForm" method="POST">
        @csrf
        <input type="hidden" name="nim" id="nim">
    </form>
    <!-- Modal -->
    <div id="gambarModal" class="modal">
        <div class="modal-content">
            <h3>Data Berhasil Diproses</h3>
            <img id="gambarHasil" src="" alt="Gambar Hasil">
        </div>
    </div>

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

                scanner.start(cameraId, {
                        fps: 5,
                        qrbox: 350
                    }, onScanSuccess, onScanError)
                    .catch(err => console.error("Gagal memulai scanner:", err));
            } else {
                console.error("Tidak ada kamera yang tersedia.");
            }
        }).catch(err => console.error("Gagal mendeteksi kamera:", err));
       //modal gambar
       let gambarPath = "{{ session('gambar') }}";
console.log("Path gambar:", gambarPath); // Debugging

if (gambarPath && gambarPath !== '') {
    let modal = document.getElementById("gambarModal");
    let img = document.getElementById("gambarHasil");

    img.src = gambarPath + "?t=" + new Date().getTime(); // Tambah timestamp untuk bypass cache

    img.onload = function () {
        console.log("Gambar berhasil dimuat:", img.src);
        modal.style.display = "block"; // Tampilkan modal setelah gambar siap
    };

    img.onerror = function () {
        console.error("Gagal memuat gambar:", img.src);
    };

    // Tutup modal setelah 5 detik
    setTimeout(() => {
        modal.style.display = "none";
    }, 5000);
}



    </script>

</body>

</html>