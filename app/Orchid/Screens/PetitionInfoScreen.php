<?php

namespace App\Orchid\Screens;

use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\Select;

class PetitionInfoScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ver una Peticion';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Toda la informacion sobre una Peticion creada.';

    /**
     * @var bool
     */
    /**
     * Query data.
     *
     * @param petition $petition
     *
     * @return array
     */
    public function query(Petition $petition): array
    {
        return [
            'petition' => $petition
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Guardar cambios')
                ->icon('pencil')
                ->method('UpdateState'),
                
            Button::make('Delete')
                ->icon('trash')
                ->method('remove'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
             Layout::legend('petition', [
                Sight::make('id')->popover('Numero identificativo de la peticion en el sistema.'),
                Sight::make('description')->popover('Descripción de la peticion.'),
                Sight::make('state')->popover('Estado de la peticion en la donacion.'),
                Sight::make('created_at')->popover('Fecha de creacion de la peticion.'),
            ]),
            Layout::legend('petition.user', [
                Sight::make('id')->popover('Numero identificativo del usuario que creo la peticion en el sistema.'),
                Sight::make('name')->popover('Nombre del usuario.'),
                Sight::make('email')->popover('Correo electronico del usuario.'),
            ]),
            Layout::rows([
                Select::make('petition.state')
                    ->options([
                        'PUBLISHED' => 'REJECTED',
                        'REJECTED' => 'REJECTED',
                    ])->title('Estado')
                    ->help('Cambia el estado de una donacion')
            ]),
        ];
    }
    /**
     * @param petition $petition
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Petition $petition)
    {
        $petition->delete();

        Alert::info('Has eliminado la Petition exitosamente');

        return redirect()->route('platform.petition.list');
    }
    public function UpdateState(DonationRequest $donationRequest, Request $request)
    {
        $donationRequest->fill($request->get('donationRequest'))->save();

        Alert::info('Has actualizado correactamente el estado!');
    }

}
