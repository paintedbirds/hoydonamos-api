<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DonationRequestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DonationRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DonationRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\DonationRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/donation-request');
        CRUD::setEntityNameStrings('donation request', 'donation requests');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->denyAccess(['create']);
        $this->crud->addFilter([
            'name'  => 'state',
            'type'  => 'dropdown',
            'label' => 'State'
          ], [
            'pending' => 'PENDING',
            'rejected' => 'REJECTED',
            'accepted' => 'ACCEPTED',
          ], function($value) {
            $this->crud->addClause('where', 'state', $value);
          });
        CRUD::column('id');
        CRUD::column('user_id');
        CRUD::column('donation_id');
        CRUD::column('reason');
        CRUD::column('state');

    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DonationRequestRequest::class);

        CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }
    protected function updateState()
    {
        $this->crud->addField([
            'name' => 'state',
            'label' => 'State',
            'type' => 'enum', 
        ]);       
         /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }
    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->updateState();
    }
}
