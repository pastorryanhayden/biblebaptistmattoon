<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinistryResource\Pages;
use App\Filament\Resources\MinistryResource\RelationManagers;
use App\Models\Ministry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use App\Models\Leader;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;

class MinistryResource extends Resource
{
    protected static ?string $model = Ministry::class;

    protected static ?string $navigationGroup = 'Church Life';

    protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    public ?string $name = '';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                ->columns(['default' => 1,
                'lg' => 4,])
                ->schema([
                    TextInput::make('name')
                    ->reactive()
                    ->columnSpan(2)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->disabled()
                    ->columnSpan(2),
                Textarea::make('meeting_info')
                ->label('Meeting Info')
                ->columnSpan(4),
                Select::make('for')
                ->label('The ministry is for...')
                ->options([
                    'kids' => 'kids',
                    'teens' => 'teens',
                    'everyone' => 'everyone',
                    'seniors' => 'seniors',
                    'men' => 'men',
                    'women' => 'women',
                    'college' => 'college',
                    'boys' => 'boys',
                    'girls' => 'girls'
                ])
                ->columnSpan(3),
                Select::make('leader_id')
                ->label('Leader')
                ->options(Leader::all()->pluck('name', 'id'))
                ->searchable()
                ->columnSpan(3),
                Checkbox::make('homepage')
                ->label('Show on homepage?')
                ->columnSpan(3),
                ]),
                Section::make('Image')
                ->columns(4)
                ->schema([
                    FileUpload::make('image')
                    ->label('Ministry Image')
                    ->columnSpan(4)
                ]),
                Section::make('Content')
                ->columns(4)
                ->schema([
                RichEditor::make('body')
                ->label('Description')
                ->columnSpan(4)
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('for')->sortable(),
                ToggleColumn::make('homepage'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMinistries::route('/'),
            'create' => Pages\CreateMinistry::route('/create'),
            'edit' => Pages\EditMinistry::route('/{record}/edit'),
        ];
    }    
}
