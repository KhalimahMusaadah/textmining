<?php

require_once 'proses_training.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["uploaded_file"])) {
        $uploadedFile = $_FILES["uploaded_file"];
        $fileTmpPath = $uploadedFile["tmp_name"];

        if (empty($fileTmpPath)) {
            echo "Please upload a file.";
        } else {
            $document = file_get_contents($fileTmpPath);

            $trainingData = file("training_data.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $classifiedCategory = "Kategori Tidak Diketahui";

            if (!empty($trainingData)) {
                $documentWords = explode(" ", $document);
                $maxSimilarity = 0;
                
                $stopwords = file("stopwords.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                foreach ($trainingData as $data) {
                    list($trainingDocument, $category) = explode("|", $data);
                    $trainingWords = explode(" ", $trainingDocument);

                    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                    $stemmer = $stemmerFactory->createStemmer();

                    $stemmedTrainingWords = explode(" ", preprocessText($trainingDocument, $stopwords));
                    $stemmedDocumentWords = explode(" ", preprocessText($document, $stopwords));

                    $similarity = calculateCosineSimilarity($stemmedDocumentWords, $stemmedTrainingWords);

                    if ($similarity > $maxSimilarity) {
                        $maxSimilarity = $similarity;
                        $classifiedCategory = $category;
                    }
                }
            }

            header("Location: testing.php?category=$classifiedCategory");
        }
    } else {
        echo "Please upload a file.";
    }
}

function calculateCosineSimilarity($document1, $document2) {
    // Pastikan tipe data adalah string sebelum menggunakan explode
    if (is_string($document1)) {
        $document1 = explode(' ', $document1);
    }

    if (is_string($document2)) {
        $document2 = explode(' ', $document2);
    }

    $dotProduct = 0;
    $magnitude1 = 0;
    $magnitude2 = 0;

    foreach ($document1 as $word1) {
        if (in_array($word1, $document2)) {
            $dotProduct += 1;
        }
        $magnitude1 += 1;
    }

    foreach ($document2 as $word2) {
        $magnitude2 += 1;
    }

    if ($magnitude1 > 0 && $magnitude2 > 0) {
        $cosineSimilarity = $dotProduct / (sqrt($magnitude1) * sqrt($magnitude2));
        return $cosineSimilarity;
    } else {
        return 0;
    }
}
