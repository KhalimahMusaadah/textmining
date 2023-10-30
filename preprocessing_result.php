<!DOCTYPE html>
<html>
<head>
    <title>Preprocessing Result</title>
    <!-- Tambahkan tautan ke Bootstrap CSS atau gaya sesuai kebutuhan -->
</head>
<body>
    <h1>Preprocessing Result</h1>

    <?php
    if (isset($_GET["document"])) {
        $preprocessedDocument = $_GET["document"];
        $category = $_GET["category"];
        
        echo "<h3>Category: $category</h3>";
        echo "<p>Preprocessed Document:</p>";
        echo "<p>$preprocessedDocument</p>";
    }
    ?>

    <div class="text-center mt-3">
        <a href="index.html" class="btn btn-secondary">Kembali ke Halaman Awal</a>
    </div>
</body>
</html>
