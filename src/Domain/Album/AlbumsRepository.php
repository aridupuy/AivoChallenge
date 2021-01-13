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
namespace App\Domain\Album;

interface AlbumsRepository
{
    /**
     * @return Album[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findAlbumsOfId(string $id): array;
}
