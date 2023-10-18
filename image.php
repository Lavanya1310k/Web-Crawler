<?php
if(isset($_GET['image'])){
    $url=$_GET['image'];
}
// $url = 'https://csigmrit.com/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
if ($html === false) {
    die('cURL error: ' . curl_error($ch));
}
curl_close($ch);

$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$images = $xpath->query('//img');

$imageUrls = array();
foreach ($images as $image) {
    $src = $image->getAttribute('src');
    // Check if the URL is relative and prefix with the base URL if needed
    if (strpos($src, 'http') !== 0) {
        $src = $url . '/' . $src;
    }
    $imageUrls[] = $src;
}

// Display the images as HTML <img> elements
// foreach ($imageUrls as $imageUrl) {
//     echo '<img src="' . $imageUrl . '" alt="Image"><br>';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
        /* width: 100%; */
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 30px;
        background: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
    }

    .container{
        width: 80%;
        height: 80vh;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        /* border: solid 1px black; */
        border-radius: 6px;
        padding: 10px;
        padding-top: 20px;
        background-color: white;
        text-wrap: wrap;
        overflow-y: scroll;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }
    .container::-webkit-scrollbar {
  width: 0;
}
    .container img{
        width: 200px;
        height: 200px;
        border-radius: 6px;
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
        

    }
    @media screen and (max-width: 480px) {
  /* Your CSS rules for screens with a width of 480 pixels or less go here */
  .container{
    width: 100vw;
    height: 100vh;
    
  }
  
body{
    padding-top: 0;
    padding: 0;
}




}
    
    </style>


<div class="container">
    <?php  
    
    foreach ($imageUrls as $imageUrl) {
        echo '<img src="' . $imageUrl . '" alt="Image"><br>';
    }
    
    ?>
</div>
</body>
</html>