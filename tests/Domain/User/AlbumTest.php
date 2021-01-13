<?php
declare(strict_types=1);

namespace Tests\Domain\Album;

use App\Domain\Album\Album;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    public function albumProvider()
    {
      $albums  = '{
                "name": "The Getaway",
                "released": "17-06-2016",
                "tracks": 13,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27358406b3f1ac3ceaff7a64fef",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "I\'m with You",
                "released": "29-08-2011",
                "tracks": 14,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27396136a2ab5696812e9b26723",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Stadium Arcadium",
                "released": "09-05-2006",
                "tracks": 29,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27309fd83d32aee93dceba78517",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "By the Way",
                "released": "09-07-2002",
                "tracks": 16,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273fdbcee40748537ff80a7af70",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "By the Way (Deluxe Edition)",
                "released": "09-07-2002",
                "tracks": 18,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273de1af2785a83cc660155a0c4",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Californication",
                "released": "08-06-1999",
                "tracks": 15,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273a9249ebb15ca7a5b75f16a90",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Californication (Deluxe Edition)",
                "released": "08-06-1999",
                "tracks": 18,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27394d08ab63e57b0cae74e8595",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "One Hot Minute (Deluxe Edition)",
                "released": "12-09-1995",
                "tracks": 16,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b2737f3dcf99224570b053294ccf",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "One Hot Minute",
                "released": "12-09-1995",
                "tracks": 13,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27384b9d450917fbae37b2e3d91",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Blood Sugar Sex Magik",
                "released": "24-09-1991",
                "tracks": 17,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273e7957730bc48a85ee53657fd",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Blood Sugar Sex Magik (Deluxe Edition)",
                "released": "24-09-1991",
                "tracks": 19,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273153d79816d853f2694b2cc70",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Mother\'s Milk",
                "released": "16-08-1989",
                "tracks": 19,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b27379ac84696fa8624e97684d27",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "The Uplift Mofo Party Plan",
                "released": "Sin informacion",
                "tracks": 12,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273ef0aaa5b8cd65ec81d22b3d9",
                    "height": 640,
                    "width": 640
                }
            },
            {
                "name": "Freaky Styley",
                "released": "16-08-1985",
                "tracks": 18,
                "cover": {
                    "url": "https://i.scdn.co/image/ab67616d0000b273d95ea73fb482cde5129fe739",
                    "height": 640,
                    "width": 640
                }
            }';
      var_dump($albums);
        return json_encode($albums);
    }

    /**
     * @dataProvider albumProvider
     * @param $id
     * @param $cover
     * @param $name
     * @param $tracks
     * @param $released
     */
     
    public function testGetters($id,$cover, $name, $tracks, $released)
    {
        $album= new Album($id,$cover, $name, $tracks, $released);

        $this->assertEquals($id, $album->getId());
        $this->assertEquals($name, $album->getName());
        $this->assertEquals($released, $album->getReleased());
        $this->assertEquals($tracks, $album->getTracks());
        $this->assertEquals($cover, $album->getCover());
    }

    /**
     * @dataProvider AlbumProvider
     * @param $id
     * @param $cover
     * @param $name
     * @param $tracks
     * @param $released
     */
    public function testJsonSerialize($id,$cover, $name, $tracks, $released)
    {
        $album= new Album($id,$cover, $name, $tracks, $released);

        $expectedPayload = json_encode([
            'id' => $id,
            'cover' => $cover,
            'name' => $name,
            'tracks' => $tracks,
            'released' => $released,
        ]);

        $this->assertEquals($expectedPayload, json_encode($album));
    }
}
