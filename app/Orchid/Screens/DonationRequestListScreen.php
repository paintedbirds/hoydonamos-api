<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\DonationRequestListLayout;
use App\Models\DonationRequest;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class  DonationRequestListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = ' Donaciones Solicitadas';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Todas las Donaciones Solicitadas listadas';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $donationRequests =  DonationRequest::filters()->defaultSort('state')->paginate(10);

        return [
            'donationRequests' => $donationRequests
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            DonationRequestListLayout::class
        ];
    }
}
