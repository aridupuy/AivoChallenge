<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Album;

use App\Domain\Album\Album;
use App\Domain\Album\AlbumNotFoundException;
use App\Domain\Album\AlbumsRepository;

class InApiAlbumRepository implements AlbumsRepository {

    /**
     * @var User[]
     */
    private $albums;
    private $accessToken;

    const URL_ARTIST = "https://api.spotify.com/v1/artists/";
    const URL_ALBUMS = "/albums";

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct() {
        $this->authenticate();
    }

    private function authenticate() {
        /* Este access token puede que expire pero como este se genera en base a mi cuenta personal prefiero por este caso dejarlo hardcodeado */
        $this->accessToken = "Bearer BQC1Kq2Vz8vIqA-Jw5TmlctIo6VyxUfYJTN61B34J4SMV6adcnHRK-89TEMkQspAIBFv9XD3GHzxTsQ66IRYNLnfT7vaTo2PjZhQBzZcAN7K8XOfzuRFNN0024OuJnFYV-JAXso7RTeA3oxMxEbuyg";
    }

    /**
     * {@inheritdoc}
     */
    public function findAlbumsOfId(String $id): array{
        $this->obtainFromServer($id);
        return $this->albums;
    }

    private function obtainFromServer($id) {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' =>
                "Authorization: " . $this->accessToken
            )
        );
        $context = stream_context_create($opts);
        $result = file_get_contents(self::URL_ARTIST . $id . self::URL_ALBUMS, true, $context);
        $resultado = json_decode($result, true);
        foreach ($resultado["items"] as $item) {
            unset($item["available_markets"]);
            if (count($item["images"]) > 0) {
                $images = ["url" => $item["images"][0]["url"], "height" => $item["images"][0]["height"], "width" => $item["images"][0]["width"]];
            } else {
                $images = "No imagen";
            }
            $released = \DateTime::createFromFormat("Y-m-d", $item["release_date"]);


            $this->albums[$item["artists"][0]["name"]]
                        [] = new Album(
                        $item["id"]
                        , $images
                        , $item["name"]
                        , $item["total_tracks"]
                        , $released);
        }
    }

    public function findAll(): array {
        
    }

}
