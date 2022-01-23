<?php

namespace Domain\Book\Enum;

enum WorldType: string {
    case Real = 'Real';
    case Hybrid = 'Hybrid';
    case Fiction = 'Fiction';
}