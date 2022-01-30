<?php

namespace Domain\App\Enum;

enum AgeGroupEnum: string {
    case Child = 'Children';
    case MiddleSchool = 'Middle School';
    case YoungAdult = 'Young Adult';
    case Adult = 'Adult';
    case Everyone = 'Everyone';

    // Get the age range of the group
    public function ageRange(): string {
        return match ($this) {
            self::Child => '3-6',
            self::MiddleSchool => '7-12',
            self::YoungAdult => '12-18',
            self::Adult => '18+',
            self::Everyone => 'All Ages',
        };
    }
}