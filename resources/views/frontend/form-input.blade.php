<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    @if(session('message'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let userRole = @json(session('role')); // Role: mahasiswa, panitia, senat, orangtua
        let userData = @json(session('user_data')); // Data user: nama, nim, jurusan, foto, seksi

        let templateImage = "{{ asset('storage/template/tmpilan_mahasiswa.png') }}"; // Default mahasiswa

        // Set template gambar berdasarkan role
        @if(session('role') == 'panitia')
            templateImage = "{{ asset('storage/template/tmpilan_panitia.png') }}";
        @elseif(session('role') == 'senat')
            templateImage = "{{ asset('storage/template/tmpilan_senat.png') }}";
        @elseif(session('role') == 'orangtua')
            templateImage = "{{ asset('storage/template/tmpilan_orangtua.png') }}";
        @endif

        let content = `
            <div style="position: relative; width: 1000px; height: 600px; overflow: hidden;">
                <img src="${templateImage}" alt="Template Wisuda" style="width: 100%; height: 100%; display: block;">
        `;

        // Semua role punya nama
        content += `
            <div style="position: absolute; left: 525px; top: 220px; color: white; font-size: 28px; font-weight: bold;">
                ${userData.nama}
            </div>
        `;

        // Mahasiswa: Foto, Nama, NIM, Jurusan
        if (userRole === 'mahasiswa') {
            content += `
                <div style="position: absolute; left: 150px; top: 250px;">
                    <img src="${userData.foto}" alt="Foto Mahasiswa" style="width: 120px; height: 150px; border-radius: 10px;">
                </div>
                <div style="position: absolute; left: 670px; top: 325px; color: white; font-size: 28px; font-weight: bold;">
                    ${userData.nim ?? '-'}
                </div>
                <div style="position: absolute; left: 610px; top: 440px; color: white; font-size: 28px; font-weight: bold;">
                    ${userData.jurusan ?? '-'}
                </div>
            `;
        }

        // Panitia: Nama, Seksi
        if (userRole === 'panitia') {
            content += `
                <div style="position: absolute; left: 610px; top: 350px; color: white; font-size: 28px; font-weight: bold;">
                    Seksi: ${userData.seksi ?? '-'}
                </div>
            `;
        }

        // Senat: Nama, Foto
        if (userRole === 'senat') {
            content += `
                <div style="position: absolute; left: 150px; top: 250px;">
                    <img src="${userData.foto}" alt="Foto Senat" style="width: 120px; height: 150px; border-radius: 10px;">
                </div>
            `;
        }

        content += `</div>`; // Tutup div utama

        Swal.fire({
            title: @json(session('message')),
            width: 1100,  
            heightAuto: false, // Hindari scroll
            html: content,
            showConfirmButton: false,
            timer: 4000
        });
    </script>
@endif








    <div class="container">
        <h1>Scan Untuk Absen</h1>
        <input type="text" id="barcodeInput" autofocus onfocus="this.select()"> <!-- Input disembunyikan -->
        <p class="decoration">Arahkan scanner barcode ke QR Code</p>
    </div>

    <style>
        /* Sembunyikan input, tapi tetap bisa menerima input scanner */
        #barcodeInput {
            opacity: 0;
            position: absolute;
            left: -9999px;
        }
    </style>

    <form id="absenForm" method="POST">
        @csrf
        <input type="hidden" name="nim" id="nim">
    </form>

    <!-- Modal -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let isScanning = false; // Flag untuk delay scan
            let barcodeInput = document.getElementById("barcodeInput");

            document.addEventListener("keydown", function(event) {
                if (event.key === "Enter" && barcodeInput.value.trim() !== "" && !isScanning) {
                    isScanning = true; // Kunci agar tidak bisa scan lagi sebelum delay selesai

                    let barcodeValue = barcodeInput.value.trim();
                    console.log("Barcode terbaca:", barcodeValue);
                    barcodeInput.value = ""; // Kosongkan input setelah scan

                    let formAction;
                    if (barcodeValue.startsWith("S")) {
                        formAction = "/senat-absent/" + barcodeValue;
                    } else if (barcodeValue.startsWith("R")) {
                        formAction = "/rektorat-absent/" + barcodeValue;
                    } else if (barcodeValue.startsWith("P")) {
                        formAction = "/panitia-absent/" + barcodeValue;
                    } else if (barcodeValue.startsWith("ayah_") || barcodeValue.startsWith("ibu_")) {
                        formAction = "/parent-absent/" + barcodeValue;
                    } else if (barcodeValue.length >= 7) {
                        formAction = "/absent/" + barcodeValue;
                    } else {
                        // Handle kondisi jika tidak sesuai dengan aturan di atas
                        formAction = "/unknown-barcode/" + barcodeValue;
                        alert("Barcode tidak dikenali!");
                    }
                    let form = document.getElementById("absenForm");
                    form.action = formAction;
                    form.submit();

                    // Timer delay 2 detik sebelum bisa scan lagi
                    setTimeout(() => {
                        isScanning = false; // Buka kunci scan setelah 2 detik
                    }, 2000);
                } else {
                    barcodeInput.focus(); // Pastikan tetap fokus ke input agar scanner tetap berfungsi
                }
            });
        });
    </script>




</body>


</html>