<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Enums\Localization;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EmployeeStatsOverview extends BaseWidget
{

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {

        return [
            Stat::make(__(Localization::Employee->value . '.count'), $this->getEmployeesCount())
                ->chart([2, 2])
                ->color('success'),
        ];
    }


    public function getEmployeesCount()
    {
        return Employee::count();
    }
}
