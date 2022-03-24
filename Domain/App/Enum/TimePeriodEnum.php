<?php

namespace Domain\App\Enum;

enum TimePeriodEnum: string {
    case Prehistoric = 'PREHISTORIC';
    case Ancient = 'ANCIENT';
    case Medieval = 'MEDIEVAL';
    case Classical = 'CLASSICAL';
    case Renaissance = 'RENAISSANCE';
    case Industrial = 'INDUSTRIAL';
    case Near_Future = 'NEAR_FUTURE';
    case Far_Future = 'FAR_FUTURE';
}
