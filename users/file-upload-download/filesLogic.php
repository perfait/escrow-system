<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'escrow');

$sql = "SELECT * FROM verification";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
$transaction_id = $_SESSION['transactionId'];

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script>alert("Your file extension must be .zip, .pdf or .docx"); location = "http://localhost/escrow/users/file-upload-download/index.php"</script>';
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo '<script>alert("File is too large"); location = "http://localhost/escrow/users/file-upload-download/index.php"</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO verification (id, name, size, downloads) VALUES ('$transaction_id','$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("File uploaded successfully"); location = "http://localhost/escrow/users/file-upload-download/index.php"</script>';
            }
        } else {
            echo '<script>alert("Failed to upload file"); location = "http://localhost/escrow/users/file-upload-download/index.php"</script>';
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}