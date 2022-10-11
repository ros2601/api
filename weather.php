<?php
$city="";
$status="";
$message="";

if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    
    if($result['cod']==200){
        $status="yes";
    }
    else{
        $message=$result['message'];
    }
}
?>

<html lang="en" class=" -webkit-">
   <head>
      <meta charset="UTF-8">
      <title>Weather/title>
       <style>
         body{
            background:lightyellow;
         }
      .input{
        width: 80%;
        text-align:center;
        margin:auto; 
         
      }
      .output{
        width: 30%;
        text-align:center;
        margin:auto; 

        padding:5%;
        border-radius:10px; 
      }
      .output h2{
         font-size:20px;   
        

      }
      .input form{
         width:50%;
         margin:auto;
         padding:2%;
         
      }
      input{
         border-radius:5px;
         padding:7px 10px 7px 10px;
         border:1px solid grey;
      }
      </style> 
   </head>
   <body>
   <?php echo $message?>
      <div class="input">
         <form method="post">
            <input type="text" class="text" placeholder="Enter city name" name="city" value="<?php echo $city?>"/>
            <input type="submit" value="Submit" class="submit" name="submit"/>
         </form>
      </div>
      <div class="output">
      <?php if($status=="yes"){?>
         <h2>Showing results for City :  <?php echo $result['name']?></h2>
         <img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon']?>@4x.png"/></h2>
         <h2>Date: <?php echo date('d M Y',$result['dt'])?> </h2>
         <h2>Temperature : <?php echo round($result['main']['temp']-273.15)?>°C</h2>
         <h2>Weather :  <?php echo $result['weather'][0]['main']?></h2>
        
         <h2>Wind Speed : <?php echo $result['wind']['speed']?> M/H</h2>
        
      <?php } ?>
      </div>
   </body>
</html>
