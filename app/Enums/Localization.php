<?php

namespace App\Enums;


enum Localization: string
{
    case Employee = 'employee';
    case Doctor = 'doctor';
    case GeneralSpecialization = 'general_specialization';
    case SpecificSpecialization = 'specific_specialization';
}
