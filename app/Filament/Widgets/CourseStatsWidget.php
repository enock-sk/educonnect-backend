<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Course;

class CourseStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            'totalCourses' => Course::count(),
            'activeCourses' => Course::where('status', 'active')->count(),
            'completedCourses' => Course::where('status', 'completed')->count(),
            'pendingCourses' => Course::where('status', 'pending')->count(),
            'canceledCourses' => Course::where('status', 'canceled')->count(),
            'recentCourses' => Course::orderBy('created_at', 'desc')->take(5)->get()->map(function ($course) {
                return [
                    'title' => $course->title,
                    'created_at' => optional($course->created_at)->format('Y-m-d H:i:s'),
                    'status' => $course->status,
                ];
            }),
        ];
    }
}
