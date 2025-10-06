<?php
// =============================================
// Simple File Upload Demo in PHP
// =============================================

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

        // Get file info
        $fileName = $_FILES['file']['name'];       // Original file name
        $fileTmpPath = $_FILES['file']['tmp_name']; // Temporary file path
        $fileSize = $_FILES['file']['size'];        // File size in bytes
        $fileType = $_FILES['file']['type'];        // MIME type

        // Define upload directory
        $uploadDir = __DIR__ . '/uploads/';

        // Create the upload directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate a unique name to avoid overwriting
        $newFileName = time() . '_' . basename($fileName);

        // Full path for saving file
        $destination = $uploadDir . $newFileName;

        // Move file from temp directory to target folder
        if (move_uploaded_file($fileTmpPath, $destination)) {
            echo "✅ File uploaded successfully!<br>";
            echo "File name: $newFileName<br>";
            echo "Size: " . round($fileSize / 1024, 2) . " KB<br>";
            echo "Type: $fileType<br>";
        } else {
            echo "❌ Error: Failed to move uploaded file.";
        }

    } else {
        echo "⚠️ No file uploaded or upload error occurred.";
    }
}
?>

<!-- =============================================
     Simple HTML form for file upload
     ============================================= -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload Demo</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Select a file:</label><br>
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
