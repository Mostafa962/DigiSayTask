<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ClientDataTable;
use App\DataTables\ServiceDataTable;
use DataTables;
use App\Client;
use App\Service;

class ClientController extends Controller
{

    //show datatable of clienta
    public function index(ClientDataTable $client)
    {
        return $client->render('admin-panel.clients.show',['title'=>trans('admin.clients')]);
    }

    //add new clients
    public function create()
    {
       return view('admin-panel.clients.add');
    }
    public function store(Request $request)
    {
        $client = $request->all();
        $newClient = Client::create($client);
        $client_id = $newClient->id;
        return view('admin-panel/clients/services',compact('client_id'));
    }
    public function show($id)
    {
        $client = Client::find($id);
        $services = $client->services;
        return view('admin-panel/clients/services_clients',['client'=>$client,'services'=>$services]);
    }

    //Update Clients Data
    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin-panel.clients.edit',compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = $request->all();
        Client::findOrFail($id)->update($client);
        session()->flash('clientUpdated',trans('admin.client_updated'));
        return redirect('admin/client');
    }

    //delete Clients Data
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        session()->flash('clientDeleted', trans('admin.client_deleted'));
        return  redirect('admin/client');
    }
    public function services(Request $request,$id){
        session()->flash('clientAdded',trans('admin.client_added'));
        return redirect('admin/client');
    }
}
