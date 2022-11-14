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
    <h1> Page Artist </h1>
    <form class="d-flex mb-3" action = "/artist/index/" method="get">
        <input class="form-control me-2" type="search" name="name" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class = "row">
        <?php
        foreach ($artists as $artist){

            ?>
            <div class="col-md-4">
                <div class="card mb-3" style="width: 18rem;">
                    <?php if($artist->getPicture() != null) :?>
                        <img class="card-img-top" src='<?=$artist->getPicture()?>' alt= '<?=$artist->getName()?>'>
                    <?php else :?>
                        <img class="card-img-top" src='https://i.scdn.co/image/ab6761610000e5ebdc9a67f0c952133be316f4e6' alt= '<?=$artist->getName()?>'>
                    <?php endif;?>
                    <div class="card-body">
                        <h5 class="card-title"><?=$artist->getName()?></h5>
                        <p class="card-text">nb de followers :<?=$artist->getFollowers()?></p>
                        <a href="/artist/profil/<?= $artist->getIdSpotify() ?>" class="btn btn-primary">Go somewhere</a>
                        <a href="/artist/favoris/<?= $artist->getIdSpotify() ?>" class="btn btn-primary">Ajout au favoris</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </body>
    </html>
<?php
