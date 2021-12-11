<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Models\petition;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;

class PetitionListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'petitions';

    /**
     * @return TD[]
     */
    protected function columns() : array
    {
        return [
            TD::make('id', 'ID'),
            TD::make('subject', 'Titulo de la peticiones')
            ->sort(),
            TD::make('description', 'Descripción')->width('250')
                    ->render(function (Petition $petition) {
                        return Str::limit($petition['description'], 100);
                    }),
            TD::make('state', 'Estado')
            ->filter(TD::FILTER_TEXT)
            ->sort(),
            TD::make('')
                ->render(function (Petition $petition) {
                    return Link::make('Ver mas')->icon('doc')->route('platform.petition.edit', $petition);
                }),
        ];
    }
}