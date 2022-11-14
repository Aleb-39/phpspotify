<?php

namespace App\Entity;

class Artist extends Model
{
    public  int|null $id;

    public function __construct(
        public string|null $idSpotify,

        public string|null $name,

        public int|null    $followers,

        public array|null  $genders,

        public string|null $link,

        public string|null $picture,
    )
    {
        $this->table = 'artist';
    }

    public function getIdSpotify(): ?string
    {
        return $this->idSpotify;
    }

    public function setIdSpotify(string $id): self
    {
        $this->idSpotify = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setFollowers(int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): ?int
    {
        return $this->followers;
    }

    public function getGenders(): ?string
    {
        return $this->genders;
    }

    public function setGenders(string $genders): self
    {
        $this->genders = $genders;
        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
    public function display(): string
    {
        $script =' <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="'.$this->getPicture().'" alt= "'.$this->getName().'">
    <div class="card-body">
        <h5 class="card-title">'.$this->getName().'</h5>
<p class="card-text">nb de followers :'.$this->getFollowers().'</p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>';
        return $script;
    }

}

