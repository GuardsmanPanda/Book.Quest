<?php declare(strict_types=1);

namespace Domain\Author\Enum;

enum AuthorUserStatus: string {
    case FOLLOW = 'FOLLOW';
    case DEFAULT = 'DEFAULT';
    case HIDE = 'HIDE';
}
