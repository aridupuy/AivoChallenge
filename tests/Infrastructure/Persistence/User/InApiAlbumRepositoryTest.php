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
       
        $album = new Album("43otFXrY0bgaq5fB3GrZj6", ["cover"=> ["height"=> 640,"width"=> 640,
                                        "url"=> "https://i.scdn.co/image/ab67616d0000b27358406b3f1ac3ceaff7a64fef"]], 'The Getaway', 13,"17-06-2016");

        $userRepository = new InApiAlbumRepository();

        $this->assertEquals([$album], $userRepository->findAlbumsOfId()[0]);
    }
   
    
}
