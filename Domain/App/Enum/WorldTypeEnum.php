<?php declare(strict_types=1);

namespace Domain\App\Enum;

enum WorldTypeEnum: string {
    case Real = 'Real';
    case Hybrid = 'Hybrid';
    case Fictional = 'Fictional';
}