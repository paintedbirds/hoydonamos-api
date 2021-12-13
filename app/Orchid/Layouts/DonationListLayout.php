<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Models\Donation;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;

class DonationListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'donations';

    /**
     * @return TD[]
     */
    protected function columns() : array
    {
        return [
            TD::make('id', 'ID')
                    ->width('150')
                    ->render(function (Donation $donation) {
                        // Please use view('path')
                        return "<img src={$donation['image']}
                              alt='sample'
                              class='mw-100 d-block img-fluid'>
                            <span class='small text-muted mt-1 mb-0'># {$donation['id']}</span>";
                    }),
            TD::make('name', 'Nombre de la donacion')
            ->sort(),
            TD::make('description', 'Descripción')->width('250')
                    ->render(function (Donation $donation) {
                        return Str::limit($donation['description'], 100);
                    }),
            TD::make('state', 'Estado')
            ->filter(TD::FILTER_TEXT)
            ->sort(),
            TD::make('')
                ->render(function (Donation $donation) {
                    return Link::make('Ver mas')->icon('doc')->route('platform.donation.edit', $donation);
                }),
        ];
    }
}