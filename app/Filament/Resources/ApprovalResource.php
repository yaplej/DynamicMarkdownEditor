<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovalResource\Pages;
use App\Filament\Resources\ApprovalResource\RelationManagers;
use App\Models\Approval;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ApprovalResource extends Resource
{
    protected static ?string $navigationGroup = 'Settings';
    
    protected static ?string $model = Approval::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('approved')
                    ->options([
                        true => 'Approve',
                        false => 'Decline',
                        'null' => 'Undecided'
                    ])
                    ->default('null')
                    ->inline(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('approved')
                    ->options([
                        'heroicon-o-check-circle' => fn ($state): bool => $state == true,
                        'heroicon-o-ban' => fn ($state): bool => $state == false,
                        'heroicon-o-question-mark-circle' => fn ($state): bool => $state == 'null',
                    ]),
            ])
            ->filters([
                //
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApprovals::route('/'),
            'create' => Pages\CreateApproval::route('/create'),
            'edit' => Pages\EditApproval::route('/{record}/edit'),
        ];
    }
}
