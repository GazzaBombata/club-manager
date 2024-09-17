<?php

namespace App\Filament\App\Pages;

use App\Filament\App\Widgets\AffiliationFormWidget;
use App\Filament\App\Widgets\MemberProfileFormWidget;
use Filament\Pages\Page;

class MemberProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.app.pages.profile';

    protected function getHeaderWidgets(): array
    {
        return [
            AffiliationFormWidget::class,
            MemberProfileFormWidget::class,
        ];
    }
}
