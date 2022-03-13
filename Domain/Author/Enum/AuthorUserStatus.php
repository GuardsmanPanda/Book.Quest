<?php

namespace Domain\Author\Enum;

enum AuthorUserStatus: string {
    case FOLLOW = 'FOLLOW';
    case DEFAULT = 'DEFAULT';
    case HIDE = 'HIDE';
}
