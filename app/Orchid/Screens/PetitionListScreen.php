<?php
namespace App\Orchid\Screens;

use App\Orchid\Layouts\PetitionListLayout;
use App\Models\petition;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PetitionListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Peticiones';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Todas las Peticiones listadas';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $petitions = Petition::filters()->defaultSort('state')->paginate();

        return [
            'petitions' => $petitions
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
            PetitionListLayout::class
        ];
    }
}