<?php

namespace App\Filament\Pages\Tenancy;
 
use App\Models\School;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Support\Str;
 
class RegisterSchool extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register school';
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if (! $get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->live(onBlur: true)
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->afterStateUpdated(function (Closure $set) {
                        $set('is_slug_changed_manually', true);
                    })
                    ->required(),
                Forms\Components\Hidden::make('is_slug_changed_manually')
                    ->default(false)
                    ->dehydrated(false),
                // ...
            ]);
    }
 
    protected function handleRegistration(array $data): School
    {
        $school = School::create($data);
 
        $school->users()->attach(auth()->user());
 
        return $school;
    }
}