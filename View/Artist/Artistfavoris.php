

<h1 class="fs-1 fst-italic text-success m-3">Mes artistes favoris</h1>

<div class="container">
    <div class="row">
        <?php foreach ($artistes as $artiste){?>
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                                 alt="' . $this->getName() . '">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $this->getName() . '</h5>
                                <p class="card-text"></p>
                                <p class="card-text"><small
                                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                                </p>
                                <a href="/artist/deleteFav/' . $this->getId() . '" class="btn btn-warning btn-sm">Supp</a>
                                <a href="/artist/view/' . $this->getIdArtist() . '" class="btn btn-primary btn-sm">+</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
