<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumsRepository
 *
 * @author adupuy
 */
namespace App\Domain\Artist;

interface ArtistRepository
{
    
    /**
     * @param String $bandName
     * @return Artist
     * @throws ArtistNotFoundException
     */
    public function findArtistOfBandName(String $bandName): Artist;
}
