<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use App\Traits\HasResourceIndexRedirect;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    use HasResourceIndexRedirect;

    protected static string $resource = EmployeeResource::class;
}
