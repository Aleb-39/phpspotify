<?php

namespace App\Core;

class AuthSpotify
{
    public function auth(): void
    {
        $newTokenNeeded = false;
        if (empty($_SESSION)) {
            $newTokenNeeded = true;
        } else {
            if ($_SESSION['expire'] <= time()) {
                $newTokenNeeded = true;
            }
        }

        if ($newTokenNeeded) {

            $clientId = "1486432b72a843dab4f01877afd4fb24";
            $clientSecret = "0698c346abdc40ba9be384e5798bb0cf";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic ' . base64_encode($clientId . ':' . $clientSecret)
            ]);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'grant_type' => 'client_credentials'
            ]));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch), true);
            var_dump($result);
            var_dump(curl_error($ch));
            curl_close($ch);


            $_SESSION['token'] = $result['access_token'];
            $_SESSION['expire'] = time()+3600;


        }
    }
}