<?php
if (isset($_GET['search'])) {
    // Retrieve the search query from the GET request
    $searchQuery = $_GET['url'];
    

} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Web Crawling</title>
    <style>
        #url{
            min-width: 60%;
            height: 50px;
            align-items: center;
            border-radius: 100px;
            border: none;
            outline: none;
            padding: 10px;
            padding-left: 20px;
            margin-left: 15%;
            box-shadow:rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        #submit{
            border: 1px solid whitesmoke;
            background:  linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
            color: black;
            height: 40px;
            width: 80px;
            border-radius: 10px;
            cursor: pointer;
            /* box-shadow: 5px 5px 5px  lightblue; */
            padding-right: 90px;

        }
        .search{
            margin-top: 20%;
        }
        /* body{
            background-image: url(bgimg2.jpg);
        } */
/* 

.search-container{
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 5vh;
  flex-shrink: shrink;
  padding-top: 30px;
} */
.url{
  
  display: flex;
  flex-direction: column;
  text-decoration: none;
  row-gap: 40px;
  padding-top: 100px;
  
}

.url a{
  width: 240px;
  height: 35px;
  border-radius: 7px;
  background:linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: black;
  text-decoration: none;
  font-size: 15px;
}

.url a:nth-child(2){
  background: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
}

.url a:nth-child(3){
  background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
}


@media screen and (max-width: 480px) {
  /* Your CSS rules for screens with a width of 480 pixels or less go here */
 
    #submit{
      margin-left: 35%;
      margin-top: 20px;
    }
}
.container{
  width: 100%;
  height: 100vh;
  display: flex;
  align-items:center ;
  justify-content: center;
  padding: 15px 40px 15px 40px;
  flex-direction: column;

 
}

/* i{
  color: white;
  position: relative;
  right: 2%;
  font-size: 20px;
  color: midnightblue;

  /* margin: %; 
} */
body{
  background-image: url(bgimg2.jpg);
  
}

    </style>
</head>
<body>

    
 <div class="container">
 <form  class="form-inline my-2 my-lg-0 w-100" action="index.php" method="get">
        <input class="form-control mr-sm-2" type="search" name="url" id="url" placeholder="URL : https://example.com" aria-label="Search">
        <input class="btn btn-outline-success my-2 my-sm-0" id="submit" name="search" value="Search" type="submit"/>
      </form>
      <div class="url">
 
  <?php
  if(isset($_GET['search'])){
    echo " <a href='text.php?text=$searchQuery'>Extracted Text</a>
    <a href='image.php?image=$searchQuery'>Extracted Images</a>
    <a href='urls.php?urls=$searchQuery'>Extracted URLs</a>";
  }
  ?>
</div>
</div>

    <!-- <center>
    <div class="search">
    <input type="url" placeholder="Enter URL" name="url" id="url"/>
    <a href="page.php"><input id="submit" type="submit" name="submit" value="search"/></a>
    </div>
    </center> -->
</body>
</html>


