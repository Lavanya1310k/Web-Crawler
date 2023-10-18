<?php
if(isset($_GET['urls'])){
    $url=$_GET['urls'];
}
// $url = 'https://www.codechef.com/';  // Replace with the URL you want to crawl

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);

// Check for cURL errors
if ($html === false) {
    die('cURL error: ' . curl_error($ch));
}

curl_close($ch);

$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$links = $xpath->query('//a/@href');

$linkUrls = array();
foreach ($links as $link) {
    $href = $link->nodeValue;
    // Check if the URL is absolute, if not, convert it to an absolute URL
    if (strpos($href, 'http') !== 0) {
        $href = $url . '/' . ltrim($href, '/');
    }
    $linkUrls[] = $href;
}

// Display the extracted links
// foreach ($linkUrls as $linkUrl) {
//     echo $linkUrl . "\n";
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
        background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    }

        .container{
        width: 80%;
        height: 80vh;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        /* border: solid 1px black; */
        border-radius: 6px;
        padding: 10px;
        padding-top: 20px;
        row-gap: 30px;
        text-wrap: wrap;
        overflow-y: scroll;
        font-size: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        background-color: whitesmoke;
    }
    .container::-webkit-scrollbar {
  width: 0;
}

@media screen and (max-width: 480px) {
  /* Your CSS rules for screens with a width of 480 pixels or less go here */
  .link{
    padding: 0;
    width: 0;
    font-size: 15px;
  }
  .container{
    padding: 0;
    gap: 0;
    row-gap:20px ;
    

  }
  }

.link {
    padding: 30px;
    width: 60%;
    border-radius: 7px;
    text-align: center;
    color: black;
    display: flex;
    align-items: center;
    background:linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);;
    
}

.link a{
    color: black;
}
    </style>
    <div class="container">

    
<?php 

foreach ($linkUrls as $linkUrl) {

    echo "<div class='link'><a href='$linkUrl'>$linkUrl</a>  </div>";
    
}
?>

    </div>
    </div>
</body>
</html>