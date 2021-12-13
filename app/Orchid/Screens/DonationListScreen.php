<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\DonationListLayout;
use App\Models\Donation;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class DonationListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Donaciones';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Todas las Donaciones listadas';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $donations = Donation::filters()->defaultSort('state')->paginate();

        return [
            'donations' => $donations
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
            DonationListLayout::class
        ];
    }
}