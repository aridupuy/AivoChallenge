<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Artist;

use \App\Domain\Artist\Artist;
use App\Domain\Artist\ArtistNotFoundException;
use App\Domain\Artist\ArtistRepository;

class InApiArtistRepository implements ArtistRepository {

    /**
     * @var Artist[]
     */
    private $artists;
    private $accessToken;

    const URL_ARTIST = "https://api.spotify.com/v1/search";

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
        $this->accessToken = "Bearer BQAWnfXdgW9HRxY8VpPGTed0W4-GPX3FlR2Ow69qZGEb0IyyBxyXZ5kaNTVrM-RffMPjAg5tLu_BQYPcB9JTuprDhnrbm3D9Qb-axZwEdGl1Gjjz73_H86Ci223eZwUnViOoZEIbknoRqL0tvfC24Q";
    }

    /**
     * {@inheritdoc}
     */
    public function findArtistOfBandName(String $bandName): Artist {
//        var_dump($bandName);
//        exit();

        $bandNameParse = strtolower(str_replace(" ", "_", $bandName));
        $this->obtainFromServer($bandName);
        if (!isset($this->artists[$bandNameParse])) {
            throw new ArtistNotFoundException();
        }

        return $this->artists[$bandNameParse];
    }

    private function obtainFromServer($bandName) {
        $params = array("q" => $bandName, "type" => "artist");
        $queryParams = http_build_query($params);
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' =>
                "Authorization: " . $this->accessToken
            )
        );
        $context = stream_context_create($opts);
        $result = file_get_contents(self::URL_ARTIST . "?$queryParams", true, $context);
        $resultado = json_decode($result, true);
        foreach ($resultado["artists"]["items"] as $item) {
            if (count($item["images"]) > 0) {
                $images = $item["images"][0]["url"];
            } else {
                $images = "No imagen";
            }
            $artist = new Artist($item["id"], $images, $item["name"]);
            $this->artists[$artist->getName()] = $artist;
        }
    }

}
