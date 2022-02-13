<?php

namespace Domain\Narrator\Crud;

use Domain\App\Model\Uri;
use Domain\Narrator\Model\Narrator;
use Domain\Narrator\Model\NarratorUri;

class NarratorUriCreator {
    public static function create(
        Narrator $narrator,
        Uri $uri,
        string $narrator_uri,
        ?string $narrator_uri_description = null
    ): NarratorUri {
        $uu = new NarratorUri();
        $uu->narrator_id = $narrator->id;
        $uu->uri_id = $uri->id;
        $uu->narrator_uri = $narrator_uri;
        $uu->narrator_uri_description = $narrator_uri_description ?? $uri->uri_title;
        $uu->save();
        return $uu;
    }
}