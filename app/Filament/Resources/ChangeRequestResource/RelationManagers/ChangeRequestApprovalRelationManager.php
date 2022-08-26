<?php

namespace App\Filament\Resources\ChangeRequestResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Node;
use App\Models\User;
use App\Models\ChangeRequest;
use Filament\Forms\Components\Hidden;

class ChangeRequestApprovalRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'changerequestapproval';

    protected static ?string $recordTitleAttribute = 'approval';

    protected static ?string $pluralLabel = 'Approvals';

    //protected static bool $hasAssociateAction = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('approved')
                    ->options([
                        '1' => 'Approve',
                        '0' => 'Decline',
                        'null' => 'Undecided'
                    ])
                    ->inline('true'),
                //Forms\Components\Hidden::make('changerequest_id')
                //    ->default('1'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('approved')
                    ->sortable()
                    ->searchable()
                    ->options([
                        'heroicon-o-check-circle' => fn ($state): bool => $state == '1',
                        'heroicon-o-ban' => fn ($state): bool => $state == '0',
                        'heroicon-o-question-mark-circle' => fn ($state): bool => $state == 'null',
                    ])
                    ->label('Approved'),
            ])
            ->filters([
                //
            ]);
    }
}
