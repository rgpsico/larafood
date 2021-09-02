<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
        $this->middleware(['can:profiles']);
        
    }
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.pages.profiles.index',compact('profiles'));
    
    }

    public function edit($id)
    {
        if(!$profiles = $this->repository->find($id)){
            return redirect()->back();
        }        
        return view('admin.pages.profiles.edit',compact('profiles'));
    
    }


    public function update(StoreUpdateProfileRequest $request, $id)
    {
    
     
        if(!$profiles = $this->repository->find($id)){
            return redirect()->back();
        }
     
        
        $profiles->update($request->all());

        return redirect()->route('profiles.index')
        ->with('message',"Atualizado  com successo");
    }

    public function show($id)
    {
        $profile = $this->repository->find($id);

        return view('admin.pages.profiles.show',compact('profile'));
    
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
 
    }

    public function store(StoreUpdateProfileRequest $request)
    {      
        $profiles = $this->repository->create($request->all());
        return redirect()->route('profiles.index')
                        ->with('message',"Cadastrado com successo");
    
    }

   

    public function destroy($id)
    {
     
        if(!$profiles = $this->repository->find($id)){
            return redirect()->back();
        }
        $profiles->delete();
        return redirect()->route('profiles.index')
        ->with('message',"Excluido  com successo");    
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $profiles = $this->repository
                         ->where(function($query) use ($request) {
                             if($request->filter)
                             {
                                    $query->where('name',$request->filter) ;
                                    $query->orWhere('description', "LIKE", "%$request->filter%");                              
                             }                                       
                         })
                         ->paginate();

        return view('admin.pages.profiles.index',compact('profiles','filters'));
    
    }

  
}
