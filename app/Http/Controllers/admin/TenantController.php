<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenants;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;
    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;
    }

    public function index()
    {
        $tenants = $this->repository->latest()->paginate();

        return  view('admin.pages.tenants.index', compact('tenants'));
    }




    public function create()
    {
        return view('admin.pages.tenants.create');
    }

    public function store(StoreUpdateTenants $request)
    {
       
        $this->repository->create($request->all());

        return redirect()->route('tenants.index');
    }

    public function show($id)
    {
        if (!$tenant = $this->repository->with('plan')->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.tenants.show', compact('tenant'));
    }

    public function edit($id)
    {
        if ( !$tenants = $this->repository->find($id) ) {
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', compact('tenants'));
           
    }


    public function update(StoreUpdateTenants $request, $id)
    {
     
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid()) {

            if (Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $tenant->update($data);

        return redirect()->route('tenants.index');
    }



    public function destroy($id)
    {

        if (!$tenants = $this->repository->find($id)) {
            return redirect()->back();
        }

        $tenants->delete();

        if(Storage::exists($tenants->logo)) {
            Storage::delete($tenants->logo);

        }

        return redirect()->route('tenants.index')
            ->with('message', "Excluido  com successo");
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $tenants = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('name', "LIKE", "%$request->filter%");
             
                }
            })->latest()            
            ->paginate();

        return view('admin.pages.tenants.index', compact('tenants', 'filters'));
    }
}
