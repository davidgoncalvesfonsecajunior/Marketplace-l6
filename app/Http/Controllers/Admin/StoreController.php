<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }
    public function index()
    {
        $store = auth()->user()->store;
        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {

        $users = User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();
        $store = $user->store()->create($data);

        $request->session()->flash('sucesso', "Loja $request->name inserida com sucesso");

        return redirect()->route('admin.stores.index');
    }
    public function edit($store)
    {
        $store = Store::find($store);
        return view('admin.stores.edit', compact('store'));
    }
    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = Store::find($store);
        $store->update($data);

        $request->session()->flash('sucesso', "Loja $request->name atualizada com sucesso");

        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = store::find($store);
        $store->delete();

        session()->flash('sucesso', "Loja $store->name excluida com sucesso");

        return redirect()->route('admin.stores.index');
    }
}
