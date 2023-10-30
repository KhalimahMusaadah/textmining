<!DOCTYPE html>
<html>
<head>
    <title>Input Training Data</title>
    <!-- Menambahkan tautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Menambahkan gaya khusus untuk halaman -->
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk body */
            background-image: url('background.jpg'); /* Ganti 'background.jpg' dengan URL gambar latar belakang Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #fff; /* Warna teks */

            background-color: #333; /* Warna latar belakang gelap */
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk body */
            color: #fff; /* Warna teks putih */

        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Latar belakang semi-transparan untuk container */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h1 {
            color: #f8f9fa; /* Warna teks judul */
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.2); /* Latar belakang semi-transparan untuk input */
            color: #fff;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<header class="text-center py-2">
        <h1 class="text-white">Document Classification</h1>
    </header>
    <div class="container">
        <h1 class="text-center">Input Training Data</h1>
        <form method="POST" action="proses_training.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="document">Upload File (txt):</label>
                <input type="file" class="form-control-file" name="uploadedFile" accept=".txt">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" name="category">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.html" class="btn btn-secondary">Kembali ke Halaman Awal</a>
        </div>
    </div>

    <!-- Menambahkan tautan ke Bootstrap JavaScript dan jQuery (diperlukan oleh Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
