<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Navigation\MenuItem;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticationPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('CodeBeams Reviews')
            ->colors([
                'primary' => Color::hex('#5C6AC4'), // Indigo (Shopify-style)
                'secondary' => Color::hex('#00C2A8'), // Mint accent
                'success' => Color::hex('#16A34A'), // Success / published
                'warning' => Color::hex('#FACC15'), // Pending moderation
                'danger'  => Color::hex('#DC2626'), // Rejected / flagged
                'gray'    => Color::hex('#F8FAFC'), // Background neutral
            ])
            ->topNavigation()
            ->favicon(asset('images/favicon.svg'))
            // ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('16rem')
            ->brandLogo(asset('images/codebeams-logo.svg'))
            ->brandLogoHeight('2rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
            ->plugins([
                FilamentShieldPlugin::make()
                    ->navigationLabel('Roles & Permissions')                  // string|Closure|null
                    ->navigationIcon('heroicon-o-shield-check')         // string|Closure|null
                    ->activeNavigationIcon('heroicon-o-shield-check')   // string|Closure|null
                    ->navigationGroup('Access Management')                  // string|Closure|null
                    // ->navigationSort(10)                        // int|Closure|null
                    // ->navigationBadge('5')                      // string|Closure|null
                    // ->navigationBadgeColor('success')           // string|array|Closure|null
                    // ->navigationParentItem('parent.item')       // string|Closure|null
                    ->registerNavigation(true),
                FilamentEditProfilePlugin::make()
                    ->slug('profile')
                    ->setTitle('My Profile')
                    ->setNavigationLabel('My Profile')
                    ->setNavigationGroup('Group Profile')
                    ->setIcon('heroicon-o-user')
                    ->setSort(10)
                    ->shouldRegisterNavigation(false)
                    ->shouldShowEmailForm()
                    ->shouldShowDeleteAccountForm(false)
                    ->shouldShowSanctumTokens(true)
                    ->shouldShowBrowserSessionsForm(true)
                    ->shouldShowAvatarForm(true),

                TwoFactorAuthenticationPlugin::make()
                    ->enableTwoFactorAuthentication(true) // Enable Google 2FA
                    ->enablePasskeyAuthentication(true) // Enable Passkey
                    ->addTwoFactorMenuItem(false) // Add 2FA menu item
                    ->forceTwoFactorSetup(false) // Force 2FA setup


            ])
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label(fn() => auth()->user()->name)
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon('heroicon-m-user-circle'),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
