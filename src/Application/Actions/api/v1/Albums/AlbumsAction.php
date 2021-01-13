<?php
declare(strict_types=1);

namespace App\Application\Actions\api\v1\Albums;

use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;
use App\Domain\Album\AlbumsRepository;
use App\Domain\Artist\ArtistRepository;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlbumsAction
 *
 * @author adupuy
 */
abstract class AlbumsAction extends Action{
    //put your code heres
    protected $artistRepository;
    protected $albumsRepository;

    /**
     * @param LoggerInterface $logger
     * @param UserRepository  $userRepository
     */
    public function __construct(LoggerInterface $logger, ArtistRepository $artistRepository, AlbumsRepository $albumsRepository)
    {
        parent::__construct($logger);
        $this->artistRepository = $artistRepository;
        $this->albumsRepository = $albumsRepository;
    }

}
