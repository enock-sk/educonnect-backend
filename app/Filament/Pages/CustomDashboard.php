<?php

namespace App\Filament\Pages;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\Widget;
use App\Filament\Widgets\UserStatsWidget;
use App\Filament\Widgets\CourseStatsWidget;
use App\Filament\Widgets\EnrollmentStatsWidget; 
use Filament\Pages\Page;
class CustomDashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.custom-dashboard';
    protected function getHeaderWidgets(): array
    {
        return [
            UserStatsWidget::class,
            CourseStatsWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            EnrollmentStatsWidget::class,
        ];
    }

    // Optional: change the layout or title
   protected static ?string $title = 'EduConnect Admin Dashboard';

}
