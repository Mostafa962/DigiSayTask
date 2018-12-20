<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ServiceDataTable;
use App\Service;
use App\Client;
class ServicesController extends Controller
{
    //show data tabke of service
    public function index(ServiceDataTable $service)
    {
        return $service->render('admin-panel.services.show',['title'=>trans('admin.services')]);
    }
    //Add Services methods
    public function create()
    {
        $clients = Client::pluck('id','id');
        return view('admin-panel.services.add',compact('clients'));
    }
    public function store(Request $request)
    {
        $service = $request->all();
        Service::create($service);
        session()->flash('serviceAdded',trans('admin.service_added'));
        return redirect('admin/service');
    }

    //
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $clients = Client::pluck('id','id');
        return view('admin-panel.services.edit',['service'=>$service,'clients'=>$clients]);

    }

    public function update(Request $request, $id)
    {
        $service = $request->all();
        Service::findOrFail($id)->update($service);
        session()->flash('ServiceUpdated',trans('admin.service_updated'));
        return redirect('admin/service');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        session()->flash('ServicesDeleted', trans('admin.service_deleted'));
        return redirect('admin/service');

    }
}
