<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChangeRequestResource\Pages;
use App\Filament\Resources\ChangeRequestResource\RelationManagers;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestType;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\Component;
use App\Models\ChangeRequestState;
use App\Models\ChangeRequestRisk;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\MultiSelectFilter;
use App\Models\Node;
use App\Models\User;
use App\Models\Approval;
use App\Models\Service;
use App\Models\AssetType;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MultiSelect;
use Closure;

class ChangeRequestResource extends Resource
{
    protected static ?string $model = ChangeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Toggle::make('enable')
                            ->reactive(),
                            
                        Forms\Components\MarkdownEditor::make('mdtitle')
                            ->required()
                            ->columnSpan(2)
                            ->disabled(fn (Closure $get):bool => $get('enable') == 0),

                        Forms\Components\RichEditor::make('rttitle')
                            ->required()
                            ->columnSpan(2)
                            ->disabled(fn (Closure $get):bool => $get('enable') == 0),

                            ])
                    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
               
            ]);
    }
    
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChangeRequests::route('/'),
            'create' => Pages\CreateChangeRequest::route('/create'),
            'edit' => Pages\EditChangeRequest::route('/{record}/edit'),
        ];
    }
}
