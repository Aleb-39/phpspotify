<h1 class="fs-1 fst-italic text-success m-3">Mes sons favoris</h1>

<ul class="list-group list-group-light">
    <?php
    foreach ($tracks as $track){ ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://www.samplelogic.com/wp-content/uploads/2021/03/cinematic-play-btn.png" alt="" style="width: 45px; height: 45px"
                             class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">'.$this->getNumber().'. '.$this->getName().'</p>
                            <p class="text-muted mb-0">'.$this->getArtist().'</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-link btn-rounded btn-sm" href="#" role="button">'.$this->getFormatTime().'</a>
                        <a href="/track/deleteFav/'.$this->getId().'" class="btn btn-sm btn-warning">Supp</a>
                    </div>
                </li>
    <?php } ?>
</ul>