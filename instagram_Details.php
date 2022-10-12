<?php
if(!empty($_REQUEST['username']))
{
    $id=$_REQUEST['username'];

    $curl = curl_init();

    curl_setopt_array($curl, [
	CURLOPT_URL => "https://instagram130.p.rapidapi.com/account-info?username=$id",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: instagram130.p.rapidapi.com",
		"X-RapidAPI-Key: 95f4e7b7e8msh081d5fcc9913c69p102cb5jsn7915cabaeefd"
	],
]);

$response = curl_exec($curl);

$result= json_decode($response,true);

$err = curl_error($curl);

curl_close($curl);
?>
<pre>
<?php
//print_r($result);?>

</pre>
<?php
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Sending</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>

<body>

<div class="container d-flex justify-content-center" style="height: 100vh;">
    <div class="col-md-5 card1">
    <div class="container">
        <h2 class="text-center">Instagram Details</h2><br/>
        <form class="form-horizontal" action="">

            <div class="form-group">
                <div class="col-sm-10">
                    <input type="textbox" id="username" class="form-control"  name="username" placeholder="Enter UserID..">
                </div>
            </div>
            
            <br/>
            <input type="submit" name="submit" value="Search" class="btn btn-primary mt-2">
            
        </form>
    </div>

    <div class="container" style="background:lightpink; border-radius:30px; padding:20px;">
       <?php
            if ($result) {
        ?>
            
             <p><b>Instagram ID: </b><?php echo $result['username'];?></p>
             <p><b>Username: </b><?php echo $result['full_name'];?></p>
             <p><b>Biography: </b><pre><?php echo $result['biography'];?></pre></p>
             <?php
             if($result['is_private']){
                echo"<p><b>ID Type: </b> Private</p>";
             };
             ?>
              <p><b>Followers: </b><?php echo $result['edge_followed_by']['count'];?></p>
              <p><b>Followings: </b><?php echo $result['edge_follow']['count'];?></p>
           <?php
            }
            else {
        
             echo "cURL Error #:" . $err;
            }
       ?>
    </div>
</body>

</html>
