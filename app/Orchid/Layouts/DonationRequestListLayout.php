<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Models\DonationRequest;
use Orchid\Screen\Actions\Link;
use Illuminate\Support\Str;

class DonationRequestListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'donationRequests';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {            
        return [
            TD::make('id', 'ID'),
            TD::make('reason', 'Razón')->width('250')
                    ->render(function (DonationRequest $donationRequest) {
                        return Str::limit($donationRequest['reason'], 200);
                    }),
            TD::make('state', 'Estado')
            ->filter(TD::FILTER_TEXT)
            ->sort(),
            TD::make('')
                ->render(function (DonationRequest $donationRequest) {
                    return Link::make('Ver mas')->icon('doc')->route('platform.donationRequest.edit', $donationRequest);
                }),
        ];
    }
}