<?php

namespace App\Filament\Resources\Exports\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ExportsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('exporter')
                    ->label('Export Type')
                    ->formatStateUsing(fn ($state) => class_basename($state))
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Created By')
                    ->searchable(),
                TextColumn::make('total_rows')
                    ->label('Total Rows')
                    ->numeric(),
                TextColumn::make('successful_rows')
                    ->label('Success')
                    ->numeric()
                    ->badge()
                    ->color('success'),
                TextColumn::make('file_name')
                    ->label('File Name')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('completed_at')
                    ->label('Completed')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function ($record) {
                        return response()->download(
                            storage_path('app/' . $record->file_disk . '/' . $record->file_name),
                            basename($record->file_name)
                        );
                    })
                    ->visible(fn ($record) => $record->file_name && Storage::disk($record->file_disk)->exists($record->file_name)),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
