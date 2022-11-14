<?php

use App\Autoloader;
use App\Entity\Album;
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
<h1> Mes album favoris </h1>
<div class = "row">
    <?php /** @var Album[] $albums */
    foreach ($albums as $album):?>
        <div class="col-md-4">
            <div class="card mb-3" style="width: 18rem;">
                <?php if($album->getPicture() != null) :?>
                    <img class="card-img-top" src='<?=$album->getPicture()?>' alt= '<?=$album->getName()?>'>
                <?php  else :?>
                    <img class="card-img-top" src='https://i.scdn.co/image/ab6761610000e5ebdc9a67f0c952133be316f4e6' alt= '<?=$album->getName()?>'>
                <?php endif;?>
                <div class="card-body">
                    <h5 class="card-title"><?=$album->getName()?></h5>
                    <p class="card-text">realease date :<?=$album->getReleaseDate()?></p>
                    <a href="/artist/track/<?= $album->getIdSpotify() ?>" class="btn btn-primary">Go somewhere</a>
                    <a href="/artist/deletealbumfavoris/<?= $album->getIdSpotify() ?>" class="btn btn-primary">supprimer des favoris</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>

