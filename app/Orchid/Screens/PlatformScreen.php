<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Home Admin Panel';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Bienvenido al Admin Panel, gestor de datos de la aplicacion "Che, ¿ Hoy donamos ?"';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        $url = "http://ec2-3-145-124-177.us-east-2.compute.amazonaws.com/";
        return [
            Link::make('Website')
                ->href($url)
                ->icon('globe-alt'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            
        ];
    }
}
