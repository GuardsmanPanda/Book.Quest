<?php

namespace Domain\Universe\Crud;

use Domain\App\Model\Uri;
use Domain\Universe\Model\Universe;
use Domain\Universe\Model\UniverseUri;

class UniverseUriCreator {
    public static function create(
        Uri $uri,
        Universe $universe,
        string $universe_uri,
        ?string $universe_uri_description = null
    ): UniverseUri {
        $uu = new UniverseUri();
        $uu->uri_id = $uri->id;
        $uu->universe_id = $universe->id;
        $uu->universe_uri = $universe_uri;
        $uu->universe_uri_description = $universe_uri_description;
        $uu->save();
        return $uu;
    }
}