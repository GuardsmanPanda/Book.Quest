<?php declare(strict_types=1);

namespace Domain\Uri\Enum;

enum UriTypeEnum: string {
    case AUTHOR = 'AUTHOR';
    case BOOK = 'BOOK';
    case NARRATOR = 'NARRATOR';
    case SERIES = 'SERIES';
    case UNIVERSE = 'UNIVERSE';
}