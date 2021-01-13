<?php 

namespace App\Domain\Artist;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ArtistNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'El artista no existe en la base de datos';
}
