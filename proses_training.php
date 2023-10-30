<?php

// Include file Sastrawi
require_once 'vendor/autoload.php'; // Gantilah dengan path yang sesuai ke file autoload.php milik Sastrawi.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["category"])) {
        $category = $_POST["category"];

        if (isset($_FILES["uploadedFile"])) {
            $uploadedFile = $_FILES["uploadedFile"];
            $fileName = $uploadedFile["name"];
            $fileTmpPath = $uploadedFile["tmp_name"];

            // Validasi input (Anda dapat menambahkan validasi sesuai kebutuhan).
            if (empty($category)) {
                echo "Category is a required field.";
            } elseif (empty($fileName) || empty($fileTmpPath)) {
                echo "Please upload a file.";
            } else {
                // Baca konten file (menggunakan library yang sesuai untuk membaca teks dari PDF jika diperlukan).
                $fileContent = file_get_contents($fileTmpPath);

                // Baca daftar stopwords dari file
                $stopwords = file("stopwords.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                // Preprocessing teks: case folding, tokenizing, stemming, dan penghapusan stopwords.
                $preprocessedDocument = preprocessText($fileContent, $stopwords);

                // Simpan data pelatihan yang telah dipreproses ke dalam file teks (misalnya, training_data.txt).
                $trainingData = "$preprocessedDocument|$category\n"; // Format: Dokumen|Kategori

                // Buka file untuk ditulis (gunakan mode "a" untuk menambahkan data ke file yang sudah ada).
                $file = fopen("training_data.txt", "a");

                // Tulis data pelatihan ke dalam file.
                if ($file) {
                    fwrite($file, $trainingData);
                    fclose($file);

                    // Redirect ke halaman hasil preprocessing dengan pesan sukses.
                    header("Location: preprocessing_result.php?document=" . urlencode($preprocessedDocument) . "&category=$category");
                } else {
                    echo "Failed to save training data.";
                    // Tambahkan logika lain jika ada masalah dengan penyimpanan data.
                }
            }
        } else {
            echo "Please upload a file.";
        }
    } else {
        echo "Category is a required field.";
    }
}

// Fungsi untuk melakukan preprocessing teks dengan stopwords.
function preprocessText($text, $stopwords) {
    // Case Folding: Ubah teks menjadi huruf kecil.
    $text = strtolower($text);
    
    // Tokenizing: Pecah teks menjadi kata-kata.
    $words = preg_split('/\s+/', $text);

    // Inisialisasi stemmer dari Sastrawi
    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
    $stemmer = $stemmerFactory->createStemmer();
    
    // Stemming: Lakukan stemming pada setiap kata dan hapus stopwords.
    $stemmedWords = array();
    foreach ($words as $word) {
        // Hapus stopwords sebelum stemming.
        if (!in_array($word, $stopwords)) {
            // Lakukan stemming pada kata-kata dengan Sastrawi.
            $stemmedWord = $stemmer->stem($word);
            $stemmedWords[] = $stemmedWord;
        }
    }
    
    // Gabungkan kata-kata yang telah dipreproses kembali menjadi teks.
    $preprocessedText = implode(' ', $stemmedWords);
    
    return $preprocessedText;
}
?>
