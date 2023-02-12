<?php declare(strict_types=1);

namespace Domain\Uri\Crud;

use Domain\Uri\Enum\UriTypeEnum;
use Domain\Uri\Model\Uri;
use Domain\Uri\Model\UriSource;

final class UriCreator {
    public static function create(
        string $uri_target,
        UriTypeEnum $uri_type,
        UriSource $uri_source,
        string $uri_title = null,
    ): Uri {
       $uri = new Uri();
       $uri->uri_type = $uri_type->value;
       $uri->uri_target = $uri_target;
       $uri->uri_source_id = $uri_source->id;
       $uri->uri_title = $uri_title;
       $uri->save();
       return $uri;
    }
}
