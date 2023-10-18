<?php
if(isset($_GET['text'])){
    $url=$_GET['text'];
}
// $url = 'https://www.codechef.com/';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
if ($html === false) {
    die('cURL error: ' . curl_error($ch));
}

// Rest of your code for parsing and processing the HTML

curl_close($ch);

$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$paragraphs = $xpath->query('//p');
$text = '';

foreach ($paragraphs as $paragraph) {
    $text .= $paragraph->nodeValue . "<br><br>";
}

// Clean and process the text if needed

// Store or use the extracted text
// echo "$text";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Document</title>
</head>
<body>

<style>
    body{
        /* width: 100%; */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 30px;
        background:  linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
    }

    .container{
        width: 80%;
        height: 80vh;
        border: solid 1px black;
        border-radius: 6px;
        padding: 10px;
        padding-top: 50px;
        font-family: cursive;
        font-size: 16px;
        text-wrap: wrap;
        overflow-y: scroll;
        background-color: white;
    }
    h1{
        text-align: center;
        /* position: fixed; */

    }

    button{
        border: none;
        background-color: transparent;
        cursor: pointer;
        
    }
    i{
        font-size: 28px;
        color :black;
        position: absolute;
            left: 83%;
            top: 25%;
    }
    @media screen and (max-width: 480px) {
  /* Your CSS rules for screens with a width of 480 pixels or less go here */
        i{
            position: absolute;
            left: 80%;
            top: 15%;
            
        }
    
  }

    .loading-spinner {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Hide the spinner when content is loaded */
.loading-spinner ,.content{
  display: none;
}

    .container::-webkit-scrollbar {
  width: 0;
}
</style>
<button onclick="copyToClipboard()"><i class="fa-regular fa-copy"></i></button>
<h1 class="head">EXTRACTED DATA</h1>
<div class="container" id="textToCopy">
    
    <div class="loading-spinner"></div>
<p class="content" id="textToCopy"></p>

    <?php  echo "$text" ;?>
    </p>

</div>

<script>
    window.onload = function() {
  // Hide the spinner and show the content after the page is loaded
  var loadingSpinner = document.querySelector('.loading-spinner');
  var content = document.querySelector('.content');

  loadingSpinner.style.display = 'none'; // Hide the spinner
  content.style.display = 'block'; // Show the content
};

function copyToClipboard() {
    const textToCopy = document.getElementById('textToCopy');
    const textArea = document.createElement('textarea');
    textArea.value = textToCopy.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
  }


</script>

    
</body>
</html>


