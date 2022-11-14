<?php

namespace App\Controllers;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Track;

class ArtistController extends Controller
{
    public function index()
    {
        $name = "plk";
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=$name&type=artist");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $json = json_decode($result);

        curl_close($ch);
        $artists = [];
        foreach ($json->artists->items as $list) {
            $image = null;
            if (!empty($list->images)) {
                $image = $list->images[0]->url;
            }
            $artist = new Artist($list->id, $list->name, $list->followers->total, $list->genres, $list->external_urls->spotify, $image);
            $artists[] = $artist;

        }

        $this->render('Artist/index', compact('artists'));
    }


    public function profil($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $json = json_decode($result);
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id/albums");
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        $result2 = curl_exec($ch2);
        $json2 = json_decode($result2);

        $image = null;
        if (!empty($json->images)) {
            $image = $json->images[0]->url;
        }
        $artist = new Artist($json->id, $json->name, $json->followers->total, $json->genres, $json->external_urls->spotify, $image);


        $albums = [];
        foreach ($json2->items as $list) {

            $image = null;
            if (!empty($list->images)) {
                $image = $list->images[0]->url;
            }
            if ($list->album_type === 'album') {
                $album = new Album($list->id, $list->name, $list->release_date, $list->total_tracks, $image);
                $albums[] = $album;
            }
        }

        $this->render('Artist/profil', compact('artist', 'albums'));
    }

    public function track($albumId)
    {
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId");
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        $result2 = curl_exec($ch2);
        $json2 = json_decode($result2);

        $image = null;
        if (!empty($json2->images)) {
            $image = $json2->images[0]->url;
        }
        $album = new Album($json2->id, $json2->name, $json2->release_date, $json2->total_tracks, $image);
        $ch3 = curl_init();
        curl_setopt($ch3, CURLOPT_URL, "https://api.spotify.com/v1/albums/$albumId/tracks");
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        $result3 = curl_exec($ch3);

        $json3 = json_decode($result3);
        $tracks = [];

        foreach ($json3->items as $value_track) {
            $track = new Track($value_track->id, $value_track->name, $value_track->track_number, $value_track->preview_url, $value_track->artists);
            $tracks[] = $track;
        }

        //$album = new Album($value_album->id, $value_album->name, $value_album->release_date, $value_album->total_tracks, $value_album->images[0]->url, $tracks);

        $result = ['album' => $album, 'tracks' => $tracks];
        $this->render('Artist/track', compact('result'));
    }


    public function album($id)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultQuery = curl_exec($ch);
        curl_close($ch);
        $jsonAlbum = json_decode($resultQuery);
        $album = new Album($jsonAlbum->id, $jsonAlbum->name, $jsonAlbum->total_tracks, $jsonAlbum->external_urls->spotify, $jsonAlbum->images[0]->url, $jsonAlbum->release_date);

        $tracks = array();
        foreach ($jsonAlbum->tracks->items as $track) {
            $artistNames = "";
            foreach ($track->artists as $id => $artist) {
                if ($id + 1 == count($track->artists)) {
                    $artistNames .= $artist->name . ".";
                } else {
                    $artistNames .= $artist->name . ", ";
                }
            }
            $tracks[] = new Track($track->id, $track->name, $track->track_number, $track->external_urls->spotify, $track->duration_ms, $artistNames, null);
        }
        $result = ['album' => $album, 'tracks' => $tracks];
        $this->render('artist/album', compact('result'));
    }

    public function favoris($id)
    {
        //add to bdd
        var_dump($id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/" . $id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $json = json_decode($result);
        $artist = new Artist($json->id, $json->name, $json->followers->total, $json->genres, $json->external_urls->spotify, $json->images[0]->url);

        $artist->create();

        //redirection vers index

        header("Location: /artist/index");
    }

    public function favorisalbum($id)
    {
        //add to bdd
        var_dump($id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/" . $id);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $jsonAlbum = json_decode($result);
        $album = new Album($jsonAlbum->id, $jsonAlbum->name, $jsonAlbum->release_date, $jsonAlbum->external_urls->spotify, $jsonAlbum->images[0]->url);

        $album->create();

        //redirection vers index

        header("Location: /artist/index");
    }


}