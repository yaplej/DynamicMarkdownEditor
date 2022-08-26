<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChangeRequestApprovalResource\Pages;
use App\Filament\Resources\ChangeRequestApprovalResource\RelationManagers;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestApproval;
use App\Models\Approval;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ChangeRequestApprovalResource extends Resource
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $model = ChangeRequestApproval::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('change_request_id')
                    ->required()
                    ->reactive()
                    ->options(ChangeRequest::all()->pluck('name', 'id'))
                    ->searchable()
                    ->label('Change Request'),
                Forms\Components\Select::make('approval_id')
                    ->required()
                    ->reactive()
                    ->options(Approval::all()->pluck('user.name', 'id'))
                    ->searchable()
                    ->label('Approval'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('change_request_id'),
                Tables\Columns\TextColumn::make('approval_id')
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
            'index' => Pages\ListChangeRequestApprovals::route('/'),
            'create' => Pages\CreateChangeRequestApproval::route('/create'),
            'edit' => Pages\EditChangeRequestApproval::route('/{record}/edit'),
        ];
    }
}
