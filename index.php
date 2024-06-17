<?php
if(isset($_POST['download'])){ // check if the URL is exist when i click on the download button
    $imgURL = $_POST['imgurl']; //gitting the image url from the hiddin input
    $ch = curl_init($imgURL); //opening the curl
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //optmaizing the url that it is get
    $download = curl_exec($ch); // ecxcuting the url and storing it in the variable
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Check HTTP status code
    curl_close($ch); // closing the curl

    if($httpcode == 200) { // If HTTP status is OK
        ob_start(); // Start output buffering
        header('Content-type: image/jpeg');
        header('Content-Disposition: attachment; filename="thumbnail.jpg"'); // Corrected content disposition header
        echo $download;// to tell the browser or the program what is the url
        ob_end_flush(); // Flush output buffer
        exit; // Stop script execution
    } else {
        echo "Error: Unable to download image. HTTP status code: " . $httpcode;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>download youtube thumbnails</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="imgurl" class="hidden_input">
        <header>download thumbnails</header>
        <p>past video URL:</p>
        <div class="filed">
             <input class="input" type="url" placeholder="enter youtube url" required>
            <div class="bottom-line"></div>
        </div>
       
        <div class="pereview">
            <img class="thumbnail" >
            <p>past data url to see pereview</p>
        </div>
        <button type="submit" name="download">download thumbnail</button>
       <script src="main.js"></script>
    </form>
</body>
</html>