<?php

namespace Domain\Series\Crud;

use Domain\App\Model\Uri;
use Domain\Series\Model\Series;
use Domain\Series\Model\SeriesUri;

class SeriesUriCreator {
    public static function create(
        Series $series,
        Uri $uri,
        string $series_uri,
        ?string $series_uri_description = null
    ): SeriesUri {
        $uu = new SeriesUri();
        $uu->series_id = $series->id;
        $uu->uri_id = $uri->id;
        $uu->series_uri = $series_uri;
        $uu->series_uri_description = $series_uri_description;
        $uu->save();
        return $uu;
    }
}