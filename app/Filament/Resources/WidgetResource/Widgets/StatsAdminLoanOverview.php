<?php

namespace App\Filament\Resources\WidgetResource\Widgets;

use App\Models\Loan;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminLoanOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Jumlah Peminjaman', Loan::query()->count()),
            Stat::make('Jumlah Peminjaman Hari ini', Loan::query()->whereDate('created_at', Carbon::today())
                ->count()),
        ];
    }
}
