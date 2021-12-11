<?php

namespace App\Orchid\Screens;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\Select;

class DonationEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Ver una Donacion';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Toda la informacion sobre una donacion creada.';

    /**
     * @var bool
     */
    /**
     * Query data.
     *
     * @param donation $donation
     *
     * @return array
     */
    public function query(Donation $donation): array
    {
        return [
            'donation' => $donation
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
             Layout::legend('donation', [
                Sight::make('id')->popover('Numero identificativo de la donacion en el sistema'),
                Sight::make('name')->popover('Nombre de la donacion'),
                Sight::make('description')->popover('Descripción de la donacion'),
                Sight::make('state')->popover('Estado de la donacion'),
                Sight::make('created_at')->popover('Fecha de creacion de la donacion'),
            ]),
            Layout::rows([
                Select::make('donation.state')
                    ->options([
                        'pending' => 'PENDING',
                        'rejected' => 'REJETCTED',
                        'published' => 'PUBLISHED',
                    ])->title('Estado')
                    ->help('Cambia el estado de una donacion')
            ]),
            Layout::legend('donation.user', [
                Sight::make('id')->popover('Numero identificativo del usuario que creo la donacion en el sistema'),
                Sight::make('name')->popover('Nombre del usuario'),
                Sight::make('email')->popover('Correo electronico del usuario'),
            ]),
        ];
    }

    /**
     * @param donation    $donation
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdateState(Donation $donation, Request $request)
    {
        $donation->fill($request->get('donation'))->save();
        Alert::info('Has actualizado correactamente el estado!');
    }

    /**
     * @param donation $donation
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Donation $donation)
    {
        $donation->delete();

        Alert::info('Has eliminado la donacion exitosamente');

        return redirect()->route('platform.donation.list');
    }
}