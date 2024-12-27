<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Person;
use Rappasoft\LaravelLivewireTables\Views\Actions\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class PersonTable extends DataTableComponent
{
    protected $model = Person::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function actions(): array
    {
        return [
            Action::make('View Dashboard')
                ->setRoute('dashboard'),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("User type", "user_type")
                ->format(
                    fn($value, $row, Column $column) => ucfirst($row->user_type)
                )
                ->sortable(),
            Column::make("Active")
                ->label(function ($row) {
                    // Hitung apakah expired
                    return $row->end_time < now() ?                           '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">False</span>' :
                        '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">True</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Begin time", "begin_time")
                ->format(
                    fn($value, $row, Column $column) =>  \Carbon\Carbon::parse($value)->translatedFormat('d/M/Y H:i')
                )
                ->sortable(),
            Column::make("End time", "end_time")
                ->format(
                    fn($value, $row, Column $column) =>  \Carbon\Carbon::parse($value)->translatedFormat('d/M/Y H:i')
                )
                ->sortable(),
            // ButtonGroupColumn::make('Actions')
            //     ->buttons([
            //         LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
            //             ->title(fn($row) => 'View ' . $row->name)
            //             ->location(fn($row) => route('user.show', $row))
            //             ->attributes(function ($row) {
            //                 return [
            //                     'class' => 'underline text-blue-500 hover:no-underline',
            //                 ];
            //             }),
            //     ]),
        ];
    }
    public function delete($id)
    {
        Person::destroy($this->id);
        $this->resetPage(); // Reset halaman setelah penghapusan
    }
}
