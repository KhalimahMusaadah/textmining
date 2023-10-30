<!DOCTYPE html>
<html>
<head>
    <title>Document Classification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #121212;
            color: #fff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #272727;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #666;
            border-radius: 3px;
            background-color: #333;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Document Classification</h1>

    <form method="POST" action="proses_testing.php" enctype="multipart/form-data">
        <label for="document">Upload Document (txt):</label><br>
        <input type="file" name="uploaded_file" accept=".txt"><br><br>
        <input type="submit" value="Classify">
    </form>

    <?php
    // Tampilkan hasil klasifikasi disini setelah proses pemrosesan dokumen testing.
    if (isset($_GET["category"])) {
        $category = $_GET["category"];
        echo "<p>Category: $category</p>";
    }
    ?>

    <div class="text-center mt-3">
            <a href="index.html" class="btn btn-primary">Kembali ke Halaman Awal</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
