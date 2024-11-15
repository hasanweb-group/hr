<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Traits\HasResourceIndexRedirect;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    use HasResourceIndexRedirect;

    protected static string $resource = DoctorResource::class;
}
