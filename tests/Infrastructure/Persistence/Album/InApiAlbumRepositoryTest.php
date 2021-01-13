<?php
namespace Tests\Infrastructure\Persistence\Album;
require __DIR__.'/../../../bootstrap.php';
use App\Domain\Album\Album;
use \App\Infrastructure\Persistence\Album\InApiAlbumRepository;
use Tests\TestCase;

class InApiAlbumRepositoryTest extends TestCase
{
    public function testFindAlbumsOfId()
    {
       
        $newalbum = new Album("43otFXrY0bgaq5fB3GrZj6", ["cover"=> ["height"=> 640,"width"=> 640,
                                        "url"=> "https://i.scdn.co/image/ab67616d0000b27358406b3f1ac3ceaff7a64fef"]], 'The Getaway', 13,"17-06-2016");

        $userRepository = new InApiAlbumRepository();
        $array = $userRepository->findAlbumsOfId("0L8ExT028jH3ddEcZwqJJ5");
        $album = array_pop($array)[0];
        $this->assertEquals($newalbum ->getId(), $album->getId());
        $this->assertEquals($newalbum ->getTracks(), $album->getTracks());
        $this->assertEquals($newalbum ->getName(), $album->getName());
    }
   
    
}
