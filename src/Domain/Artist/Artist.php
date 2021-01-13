<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Domain\Artist;

use JsonSerializable;

class Artist implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $name;

    /**
     * @param int|null  $id
     * @param string    $username
     * @param string    $firstName
     * @param string    $lastName
     */
    public function __construct(?string $id, string $images, string $name)
    {
        $this->id = $id;
        $this->image =$images;
        $this->name = strtolower(str_replace(" ", "_", $name));
        
    }
    

    /**
     * @return int|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->name,
        ];
    }
}
