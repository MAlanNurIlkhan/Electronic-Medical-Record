<!DOCTYPE html>
<html>
<head>
    <style>
        .background {
            background-image: url('https://stikeshb.ac.id/wp-content/uploads/2023/04/Ilustrasi-digitalisasi-rekam-medis.-Sumber-Freepik-1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            position: relative; /* Menambahkan posisi relatif ke latar belakang */
        }

        .content {
            color: white;
            text-align: center;
            position: absolute; /* Menambahkan posisi absolut ke konten */
            top: 50%; /* Menggeser konten vertikal ke tengah halaman */
            left: 55%; /* Menggeser konten horizontal ke tengah halaman */
            transform: translate(-50%, -50%); /* Menggeser konten ke tengah secara tepat */
            z-index: 1; /* Menetapkan navbar di latar belakang */
            background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang dengan alpha/transparansi 0.5 */
            padding: 10px; /* Padding untuk ruang di sekitar teks */
        }

        .col-lg-12 {
            font-size : 23px;
            color : white;
        }
    </style>
</head>
<body>
    <div class="background">
        <?php include_once('../_header.php'); ?>
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <p>Selamat datang <mark> <?= $_SESSION['user']; ?> </mark> di website Rumah Sakit (Rekam Medis)</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
