<?php
declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\Artist;
require __DIR__.'/../../../bootstrap.php';
use App\Domain\Artist\Artist;
use App\Infrastructure\Persistence\Artist\InApiArtistRepository;
use Tests\TestCase;

class InApiArtistRepositoryTest extends TestCase
{
     public function testFindArtistOfBandName()
    {
       
        $artist = new Artist("0L8ExT028jH3ddEcZwqJJ5", "https://i.scdn.co/image/89bc3c14aa2b4f250033ffcf5f322b2a553d9331", "red_hot_chili_peppers");

        $userRepository = new InApiArtistRepository();
        $bandName = "red hot chili peppers";
        $searchedArtist = $userRepository->findArtistOfBandName($bandName);
        
        $this->assertEquals($artist ->getId(), $searchedArtist->getId());
        $this->assertEquals($artist ->getId(), $searchedArtist->getId());
        $this->assertNotEquals($bandName, $searchedArtist->getName());
        $this->assertEquals(strtolower(str_replace(" ", "_", $bandName)), $searchedArtist->getName());

    }
    

   
  
}
