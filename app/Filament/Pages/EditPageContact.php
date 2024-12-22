<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class EditPageContact extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.edit-page-contact';

    protected static ?string $title = 'Contact';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 5;
}
