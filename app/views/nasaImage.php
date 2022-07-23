<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?= BASE_URL . "/css/style.css" ?>">

    <title>Rezult</title>
</head>
<body class="container-fluid">
  <br><br>
<div class="row">
        <div class="col-7" id="v">
            <div class="container">
                <h1><?=$image[0]['title']?></h1>
                <h5><?=$image[0]['date']?></h5>
                <?php
                if($image[0]['media_type']=="video"){
                    $rez=explode('?',$image[0]['url']);
                    echo "<iframe width='820' height='515' src='".$rez[0]."?autoplay=1&mute=1'></iframe><br><br>";
                }else{
               
               echo "<img src='".$image[0]['url']."' alt=''><br><br>";
                }
                ?>
                <a class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']?>?action=home" role="button">Повторити</a>

            </div>
        </div>
    <div class="col-4" id="v">
    <div class="container">
        <br><br><br><br>
                <h3>Explanation:</h3>
                <p><?=$image[0]['explanation']?></p><br>
                <h4>Media-type:</h4>
                <h5><?=$image[0]['media_type']?></h5><br>
                <h4>Servise-version:</h4>
                <h5><?=$image[0]['service_version']?></h5>
            </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>