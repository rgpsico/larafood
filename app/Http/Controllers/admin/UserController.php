<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
        $this->middleware(['can:user']);
        
    }
    public function index()
    {

        $users = $this->repository->latest()->tenantUser()->paginate();
        return view('admin.pages.users.index',compact('users'));
    
    }

    public function edit($id)
    {
        if(!$user = $this->repository->find($id)){
            return redirect()->back();
        }        
        return view('admin.pages.users.edit',compact('user'));
    
    }


    public function update(StoreUpdateUsersRequest $request, $id)
    {
    
     
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $data = $request->only(['name','email']);
         
        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }
          
        $users->update($data);

        return redirect()->route('users.index')
        ->with('message',"Atualizado  com successo");
    }

    public function show($id)
    {
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.show',compact('user'));
    
    }

    public function create()
    {
        return view('admin.pages.users.create');
 
    }

    public function store(StoreUpdateUsersRequest $request)
    {   
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
     
        $data['password'] = bcrypt($data['password']); // encrypt password

        $this->repository->create($data);

        return redirect()->route('users.index');
    
    }

   

    public function destroy($id)
    {
     
        if (!$user = $this->repository->tenantUser()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('users.index')
        ->with('message',"Excluido  com successo");    
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $users = $this->repository
                         ->where(function($query) use ($request) {
                             if ($request->filter) {
                                    $query->orWhere('name', "LIKE", "%$request->filter%");     
                                    $query->orWhere('email', "LIKE", "%$request->filter%");                             
                                }                                       
                        })->latest()
                          ->tenantUser()
                         ->paginate();

        return view('admin.pages.users.index',compact('users','filters'));
    
    }
}
