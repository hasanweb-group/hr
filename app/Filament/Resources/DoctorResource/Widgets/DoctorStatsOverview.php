<?php

namespace App\Filament\Resources\DoctorResource\Widgets;

use App\Enums\Localization;
use App\Models\Doctor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DoctorStatsOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {

        return [
            Stat::make(__(Localization::Doctor->value . '.count'), $this->getDoctorsCount())
                ->chart([2, 2])
                ->color('success'),
        ];
    }


    public function getDoctorsCount()
    {
        return Doctor::count();
    }
}
