<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    public function __construct(Category $category)
    {
        $this->repository = $category;
        $this->middleware(['can:categories']);
    }

    public function index()
    {
        $categories = $this->repository->latest()->paginate();

        return  view('admin.pages.categories.index', compact('categories'));
    }




    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(StoreUpdateCategoriesRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('categories.index')
        ->with('message', "Cadastrado  com successo");;;
    }

    public function show($id)
    {
        if (!$categories = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('categories'));
    }

    public function edit($id)
    {
        if ( !$categories = $this->repository->find($id) ) {
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('categories'));
           
    }


    public function update(StoreUpdateCategoriesRequest $request, $id)
    {

        if (!$categories = $this->repository->find($id)) {
            return redirect()->back();
        }
        $categories->update($request->all());

        return redirect()->route('categories.index')
            ->with('message', "Atualizado  com successo");
    }



    public function destroy($id)
    {

        if (!$categorie = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categorie->delete();

        return redirect()->route('categories.index')
            ->with('message', "Excluido  com successo");
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $categories = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('description', "LIKE", "%$request->filter%");
                    $query->orWhere('name', "LIKE", "%$request->filter%");
                }
            })->latest()            
            ->paginate();

        return view('admin.pages.categories.index', compact('categories', 'filters'));
    }
}
