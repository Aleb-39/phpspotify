<?php

use App\Autoloader;
use App\Entity\Artist;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>spotify</title>
</head>
<body>
<h1> Page Track </h1>
<?php
$album = $result['album'];
$tracks = $result['tracks']
?>
<div class="card mb-3" style="width: 18rem;">
    <?php if($album->getPicture() != null) :?>
        <img class="card-img-top" src='<?=$album->getPicture()?>' alt= '<?=$album->getName()?>'>
    <?php  else :?>
        <img class="card-img-top" src='https://i.scdn.co/image/ab6761610000e5ebdc9a67f0c952133be316f4e6' alt= '<?=$album->getName()?>'>
    <?php endif;?>
    <div class="card-body">
        <h5 class="card-title"><?=$album->getName()?></h5>
        <p class="card-text">realease date :<?=$album->getReleaseDate()?></p>

        <a href="/artist/profil/?id=<?= $album->getIdSpotify() ?>" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
    <?php foreach ($tracks as $track):?>

                    <ul>
                    <li><?=$track->getTrackNumber()?> : <?=$track->getName()?>
                    <a href="#" class="btn btn-primary">Play</a>
                        <a href="#" class="btn btn-primary">Ajout au favoris</a></>
                    </ul>
    <?php endforeach; ?>
</body>
</html>


