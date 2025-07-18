<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Enrollment;

class EnrollmentStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            'totalEnrollments' => Enrollment::count(),
            'enrollmentRate' => Enrollment::where('created_at', '>=', now()->subMonth())->count(),
            'recentEnrollments' => Enrollment::orderBy('created_at', 'desc')->take(5)->get()->map(function ($enrollment) {
                return [
                    'course' => $enrollment->course->title,
                    'user' => $enrollment->user->name,
                    'enrolled_at' => $enrollment->enrolled_at,
                ];
            }),
        ];

        }
    }

