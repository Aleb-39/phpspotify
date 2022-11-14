<?php

namespace App\Entity;

use App\Entity\Track;

class Album  extends Model {
    public string|null $id;
    public function __construct(
        public string|null $idSpotify,
        public string|null $name,

        public string|null $release_date,

        public string|null $tracks,

        public string|null $picture,
    )
    {
        $this->table = 'album';
    }

    /**
     * @return string|null
     */
    public function getIdSpotify(): ?string
    {
        return $this->idSpotify;
    }

    /**
     * @param string|null $idSpotify
     */
    public function setIdSpotify(?string $idSpotify): void
    {
        $this->idSpotify = $idSpotify;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getReleaseDate(): ?string
    {
        return $this->release_date;
    }

    /**
     * @param int|null $release_date
     */
    public function setReleaseDate(?string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return array|null
     */
    public function getTotalTracks(): ?array
    {
        return $this->total_tracks;
    }

    /**
     * @param array|null $total_tracks
     */
    public function setTotalTracks(?array $total_tracks): void
    {
        $this->total_tracks = $total_tracks;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }
}

