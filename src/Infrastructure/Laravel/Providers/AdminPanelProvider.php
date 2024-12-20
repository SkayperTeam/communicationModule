<?php

declare(strict_types=1);

namespace Infrastructure\Laravel\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

final class AdminPanelProvider extends PanelProvider
{
    /**
     * @throws \Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(
                in: base_path('src/Presentation/Admin/Resources'),
                for: 'Presentation\\Admin\\Resources',
            )
            ->discoverPages(
                in: base_path('src/Presentation/Admin/Pages'),
                for: 'Presentation\\Admin\\Pages',
            )
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(
                in: base_path('src/Presentation/Admin/Widgets'),
                for: 'Presentation\\Admin\\Widgets',
            )
            ->widgets([
                //
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Настройки')
                    ->icon('heroicon-c-cog'),
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Логи')
                    ->url(static fn (): string => route('log-viewer.index'), true)
                    ->icon('heroicon-m-numbered-list'),
                MenuItem::make()
                    ->label('Telescope')
                    ->url(static fn (): string => route('telescope'), true)
                    ->icon('heroicon-m-chart-pie'),
                MenuItem::make()
                    ->label('Horizon')
                    ->url(static fn (): string => route('horizon.index'), true)
                    ->icon('heroicon-c-qr-code'),
                MenuItem::make()
                    ->label('Pulse')
                    ->url(static fn (): string => route('pulse'), true)
                    ->icon('heroicon-m-signal'),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->spa();
    }
}
