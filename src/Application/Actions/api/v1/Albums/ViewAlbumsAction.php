<?php
namespace App\Application\Actions\api\v1\Albums;
use Psr\Http\Message\ResponseInterface as Response;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewAlbums
 *
 * @author adupuy
 */
class ViewAlbumsAction extends AlbumsAction{
    //put your code here
    protected function action(): Response
    {
        $albumName = $this->request->getQueryParams('q')["q"];
        $artist = $this->artistRepository->findArtistOfBandName($albumName);
        $albums = $this->albumsRepository->findAlbumsOfId($artist->getId());
        $this->logger->info("User of id `${albumName}` was viewed.");
        return $this->respondWithData($albums);
    }
    
    
}
