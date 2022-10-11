<?php
$url = 'https://api.quotable.io/random';
$result = json_decode(file_get_contents($url));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quotes Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
     .main{
        width:100%;
        margin-top:100px;
        margin-left: 30%;
        text-align: center; 
     }
    </style>
</head>
<body>
<div class="main">
<div class="card text-white bg-dark mb-3" style="max-width:400px;">
  <div class="card-header"><h2>Quote</h2></div>
  <div class="card-body" >
    <p class="card-text"><?php echo $result->content; ?></p>
    <h5 class="card-title"><?php echo $result->author; ?></h5>
    <form>
    <input type="submit" class="btn btn-sm btn-outline-light mt-2" value="Next">
</form>
  </div>
</div>
</div>
</form>
</div>
</body>
</html>