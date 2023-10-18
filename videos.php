<?php
$url = 'https://csigmrit.com/';
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

// Extract video URLs from HTML5 video tags
$html5Videos = $xpath->query('//video/source');
$html5VideoUrls = array();
foreach ($html5Videos as $source) {
    $html5VideoUrls[] = $source->getAttribute('src');
}

// Extract video URLs from iframe elements
$iframes = $xpath->query('//iframe');
$iframeVideoUrls = array();
foreach ($iframes as $iframe) {
    $iframeSrc = $iframe->getAttribute('src');
    if (strpos($iframeSrc, 'youtube.com') !== false) {
        // YouTube video URL
        $iframeVideoUrls[] = $iframeSrc;
    }
    // Add more conditions for other video hosting platforms if needed
}
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
    }

    .container{
        width: 80%;
        height: 80vh;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        /* border: solid 1px black; */
        border-radius: 6px;
        padding: 10px;
        padding-top: 20px;
        
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
    
    </style>


<div class="container">
    <?php  
    
    foreach ($iframeVideoUrls as $iframeVideoUrl) {
        echo '<img src="' . $iframeVideoUrl . '" alt="Video"><br>';
    }
    // foreach ($iframes as $iframe) {
    //     $iframeSrc = $iframe->getAttribute('src');
    //     if (strpos($iframeSrc, 'youtube.com') !== false) {
    //         // YouTube video URL
    //         $iframeVideoUrls[] = $iframeSrc;
    //     }
    //     // Add more conditions for other video hosting platforms if needed
    // }
    
    ?>
</div>
</body>
</html>