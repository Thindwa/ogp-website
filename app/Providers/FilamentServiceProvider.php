<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            $user = auth()->user();

            if ($user && $user->isTWGManager()) {
                // Navigation groups for TWG managers
                Filament::registerNavigationGroups([
                    NavigationGroup::make()
                        ->label('My TWG Content')
                        ->collapsed(false),

                    NavigationGroup::make()
                        ->label('General Content')
                        ->collapsed(true),
                ]);
            } else {
                // Default navigation for admin and content managers
                Filament::registerNavigationGroups([
                    NavigationGroup::make()
                        ->label('Content Management')
                        ->collapsed(false),

                    NavigationGroup::make()
                        ->label('Technical Working Groups')
                        ->collapsed(false),

                    NavigationGroup::make()
                        ->label('System')
                        ->collapsed(true),
                ]);
            }
        });
    }
}
