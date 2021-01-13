<?php
declare(strict_types=1);

use App\Domain\Album\AlbumsRepository;
use App\Domain\Artist\ArtistRepository;
use App\Infrastructure\Persistence\Album\InApiAlbumRepository;
use App\Infrastructure\Persistence\Artist\InApiArtistRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        ArtistRepository::class => \DI\autowire(InApiArtistRepository::class),
        AlbumsRepository::class => \DI\autowire(InApiAlbumRepository::class),
    ]);
};
