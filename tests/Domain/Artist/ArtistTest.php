<?php
declare(strict_types=1);

namespace Tests\Domain\Artist;

use App\Domain\Artist\Artist;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    public function artistProvider()
    {
        $artist  = '{
                "id": "0215351313513513513587,
                "image": "https://i.scdn.co/image/ab67616d0000b27358406b3f1ac3ceaff7a64fef",
                "name": "Red Hot Chili Peppers"
            }';
        return json_encode($artist);
    }

    /**
     * @dataProvider albumProvider
     * @param $id
     * @param $image
     * @param $name
     */
     
    public function testGetters($id,$image, $name)
    {
        $artist= new Artist($id,$image, $name);

        $this->assertEquals($id, $artist->getId());
        $this->assertEquals($image, $artist->getimage());
        $this->assertEquals($name, $artist->getName());
    }

    /**
     * @dataProvider AlbumProvider
     * @param $id
     * @param $image
     * @param $name
     */
    public function testJsonSerialize($id,$image, $name)
    {
        $artist= new Artist($id,$image, $name);

        $expectedPayload = json_encode([
            'id' => $id,
            'image' => $image,
            'name' => $name,
        ]);

        $this->assertEquals($expectedPayload, json_encode($artist));
    }
}
