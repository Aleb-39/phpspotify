<?php

namespace App\Entity;

class Track
{
    public function __construct(
        public string|null $id,

        public string|null $name,

        public int|null $track_number,

        public string|null $preview_url,

        public array|null $artists

    )
    {
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
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
    public function getTrackNumber(): ?int
    {
        return $this->track_number;
    }

    /**
     * @param int|null $track_number
     */
    public function setTrackNumber(?int $track_number): void
    {
        $this->track_number = $track_number;
    }

    /**
     * @return string|null
     */
    public function getPreviewUrl(): ?string
    {
        return $this->preview_url;
    }

    /**
     * @param string|null $preview_url
     */
    public function setPreviewUrl(?string $preview_url): void
    {
        $this->preview_url = $preview_url;
    }

    /**
     * @return array|null
     */
    public function getArtists(): ?array
    {
        return $this->artists;
    }

    /**
     * @param array|null $artists
     */
    public function setArtists(?array $artists): void
    {
        $this->artists = $artists;
    }
}

