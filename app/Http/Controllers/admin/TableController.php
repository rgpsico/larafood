<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTable;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $repository;
    public function __construct(Table $table)
    {
        $this->repository = $table;
        $this->middleware(['can:table']);
    }

    public function index()
    {
        $tables = $this->repository->latest()->paginate();

        return  view('admin.pages.table.index', compact('tables'));
    }




    public function create()
    {
        return view('admin.pages.table.create');
    }

    public function store(StoreUpdateTable $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('table.index')
        ->with('message', "Cadastrado  com successo");;;
    }

    public function show($id)
    {
        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.table.show', compact('table'));
    }

    public function edit($id)
    {
        if ( !$table = $this->repository->find($id) ) {
            return redirect()->back();
        }

        return view('admin.pages.table.edit', compact('table'));
           
    }


    public function update(StoreUpdateTable $request, $id)
    {

        if (!$table = $this->repository->find($id)) {
            return redirect()->back();
        }
        $table->update($request->all());

        return redirect()->route('table.index')
            ->with('message', "Atualizado  com successo");
    }



    public function destroy($id)
    {

        if (!$categorie = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categorie->delete();

        return redirect()->route('table.index')
            ->with('message', "Excluido  com successo");
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $tables = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('description', "LIKE", "%$request->filter%");
                    $query->orWhere('identify', "LIKE", "%$request->filter%");
                }
            })->latest()            
            ->paginate();

        return view('admin.pages.table.index', compact('tables', 'filters'));
    }
}
