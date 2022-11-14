<?php
use App\Autoloader;
use App\Entity\Artist;
use App\Entity\Album;
?>

<div class="d-flex justify-content-center">
    <div class="card m-2 " style="width: 50%">
        <img class="card-img-top" src="'.$this->getPicture().'" alt="'.$this->getName().'"  >
        <div class="card-body">
            <h5 class="card-title">'.$this->getName().' <small class="text-muted">('.$this->getTracks().')</small></h5>
        </div>
        <div class="card-footer">
            <small class="text-muted">'.$this->getDate().'</small>
        </div>
    </div>
</div>


<ul class="list-group list-group-light">
    <?php
    foreach ($result['tracks'] as $track){?>
        <div class="col-md-4">
            <div class="card m-2">
                <img class="card-img-top" src="'.$this->getPicture().'" alt="'.$this->getName().'" width="380" height="380">
                <div class="card-body">
                    <h5 class="card-title">'.$this->getName().' <small class="text-muted">('.$this->getTracks().')</small></h5>
                    <p class="card-text"><a href="'.$this->getLink().'" class="btn btn-sm btn-success">->spotify</a> <a href="/album/view/'.$this->getIdAlbum().'" class="btn btn-sm btn-primary">+</a></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">'.$this->getDate().'</small>
                </div>
            </div>
        </div>
    <?php } ?>
</ul>