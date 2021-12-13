<?php

namespace App\Orchid\Screens;

use App\Models\DonationRequest;
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

class DonationRequestInfoScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ver una Solicitud de Donacion';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Toda la informacion sobre una Solicitud de Donacion creada.';

    /**
     * @var bool
     */
    /**
     * Query data.
     *
     * @param donationRequest $donationRequest
     *
     * @return array
     */
    public function query(DonationRequest $donationRequest): array
    {
        return [
            'donationRequest' => $donationRequest
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
             Layout::legend('donationRequest', [
                Sight::make('id')->popover('Numero identificativo de la relacion en el sistema'),
                Sight::make('reason')->popover('Descripción de la Solicitud de una Donacion'),
                Sight::make('state')->popover('Estado de la Solicitud de una Donacion'),
                Sight::make('created_at')->popover('Fecha de creacion de la Solicitud de una Donacion'),
            ]),
             Layout::rows([
                Select::make('donationRequest.state')
                    ->options([
                        'pending' => 'PENDING',
                        'accepted' => 'ACCEPTED',
                        'rejected' => 'REJETCTED',
                    ])->title('Estado')
                    ->help('Cambia el estado de una donacion')
            ]),
            Layout::legend('donationRequest.user', [
                Sight::make('id')->popover('Numero identificativo del usuario que creo la donacion en el sistema'),
                Sight::make('name')->popover('Nombre del usuario'),
                Sight::make('email')->popover('Correo electronico del usuario'),
            ]),
              Layout::legend('donationRequest.donation', [
                Sight::make('id')->popover('Numero identificativo del usuario que creo la donacion en el sistema'),
                Sight::make('name')->popover('Nombre del usuario'),
                Sight::make('state')->popover('Nombre del usuario'),
                Sight::make('description')->popover('Correo electronico del usuario'),
            ]),

        ];
    }
    /**
     * @param donationRequest $donationRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
     public function UpdateState(DonationRequest $donationRequest, Request $request)
    {
        $donationRequest->fill($request->get('donationRequest'))->save();
        Alert::info('Has actualizado correactamente el estado!');
    }

    public function remove(DonationRequest $donationRequest)
    {
        $donationRequest->delete();

        Alert::info('Has eliminado la Solicitud de una Donacion exitosamente');

        return redirect()->route('platform.donationRequest.list');
    }
}