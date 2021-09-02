<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $repository;
    public function __construct(Product $product)
    {
        $this->repository = $product;
    }

    public function index()
    {
        $products = $this->repository->latest()->paginate();

        return  view('admin.pages.products.index', compact('products'));
    }




    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(StoreUpdateProducts $request)
    {
        $data = $request->all(); 
        $tenant = auth()->user()->tenant;

        if ($request->hasFile('image') && $request->image->isValid()) {
            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
        }
     
        $this->repository->create($data);
        

        return redirect()->route('products.index')
        ->with('message', "Cadastrado  com successo");;;
    }

    public function show($id)
    {
        if (!$products = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.products.show', compact('products'));
    }

    public function edit($id)
    {
        if ( !$products = $this->repository->find($id) ) {
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('products'));
           
    }


    public function update(StoreUpdateProducts $request, $id)
    {
        $data   = $request->all();
        $tenant = auth()->user()->tenant->uuid;

        if ( !$products = $this->repository->find($id)) {
            return redirect()->back();
        } 
 

        if( $request->hasFile('image') && $request->image->isValid()) {
            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
         }

            $products->update($data);

        return redirect()->route('products.index')
            ->with('message', "Atualizado  com successo");
    }



    public function destroy($id)
    {

        if (!$products = $this->repository->find($id)) {
            return redirect()->back();
        }

        $products->delete();

        if(Storage::exists($products->image)) {
            Storage::delete($products->image);

        }

        return redirect()->route('products.index')
            ->with('message', "Excluido  com successo");
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $products = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('description', "LIKE", "%$request->filter%");
                    $query->orWhere('title', "LIKE", "%$request->filter%");
                }
            })->latest()            
            ->paginate();

        return view('admin.pages.products.index', compact('products', 'filters'));
    }
}
