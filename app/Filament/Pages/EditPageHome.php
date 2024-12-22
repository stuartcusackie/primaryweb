<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class EditPageHome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-page-home';

    protected static ?string $title = 'Home';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 1;
}
