<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MinistryResource\Pages;
use App\Models\Ministry;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MinistryResource extends Resource
{
    protected static ?string $model = Ministry::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public ?string $name = '';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                    ->columns(['default' => 1,
                        'lg' => 4, ])
                    ->schema([
                        TextInput::make('name')
                            ->reactive()
                            ->columnSpan(2)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->columnSpan(2)
                            ->disabled()
                            ->dehydrated(),
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
                                'girls' => 'girls',
                            ])
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
                            ->disk('vultr')
                            ->directory('images')
                            ->visibility('public')
                            ->columnSpan(4),
                    ]),
                Section::make('Content')
                    ->columns(4)
                    ->schema([
                        MarkdownEditor::make('body')
                            ->label('Description')
                            ->fileAttachmentsDisk('vultr')
                            ->fileAttachmentsDirectory('images')
                            ->fileAttachmentsVisibility('public')
                            ->columnSpan(4),
                    ]),

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

    protected static ?string $navigationGroup = 'Setup';

    protected static ?int $navigationSort = 3;
}
