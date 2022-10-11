
<?php
if(isset($_REQUEST['convert']))
{
    $text=$_REQUEST['text'];
    $text=htmlspecialchars($text);
    $text=rawurlencode($text);
    echo $text;
    $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$text.'&tl=en-IN');
	$player="<audio controls='controls'><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
	echo $player;
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
    <div class="container">
        <h2 class="text-center">Translator</h2>
        <form class="form-horizontal" action="">

            <div class="form-group">
                <div class="col-sm-10">
                    <input type="textbox" id="text" class="form-control"  name="text" placeholder="Enter text..">
                </div>
            </div>
            
            <br/>
            <div class="form-group">
                <div class="control-label col-sm-2 col-sm-10">
                    <button type="submit" name="convert" value="convert" class="btn btn-primary">Convert</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>