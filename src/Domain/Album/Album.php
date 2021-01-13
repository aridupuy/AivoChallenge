<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\Album;

use JsonSerializable;

class Album implements JsonSerializable {

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var array
     */
    private $cover;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $tracks;

    /**
     * @var \DateTime
     */
    private $released;

    /**
     * @param int|null  $id
     * @param string    $image
     * @param string    $Name
     * 
     */
//    [{
//    "name": "Album Name",
//    "released": "10-10-2010",
//     "tracks": 10,
//     "cover": {
//         "height": 640,
//         "width": 640,
//         "url": "https://i.scdn.co/image/6c951f3f334e05ffa"
//     }
// },
//  ...
//]
    public function __construct(?string $id, array $cover, $name, $tracks, $released) {
        $this->id = $id;
        $this->cover = $cover;
        $this->name = $name;
        $this->tracks = $tracks;
        $this->released = $released;
    }

    /**
     * @return int|null
     */
    public function getId(): ?string {
        return $this->id;
    }

    function getName(): string {
        return $this->name;
    }

    function getTracks() {
        return $this->tracks;
    }

    function getReleased(): \DateTime {
        return $this->released;
    }

    function setName(string $name): void {
        $this->name = $name;
    }

    function setTracks(integer $tracks): void {
        $this->tracks = $tracks;
    }

    function setReleased(\DateTime $released): void {
        $this->released = $released;
    }
    function getCover(): array {
        return $this->cover;
    }

    function setCover(array $cover): void {
        $this->cover = $cover;
    }

        /**
     * @return array
     */
    public function jsonSerialize() {
        if ($this->released)
            $released = $this->released->format("d-m-Y");
        else
            $released = "Sin informacion";
        return [
            'id' => $this->id,
            'name' => $this->name,
            'released' => $released,
            'tracks' => $this->tracks,
            'cover' => ["url" => $this->cover["url"], "height" => $this->cover["height"], "width" => $this->cover["width"]]
        ];
    }

}
