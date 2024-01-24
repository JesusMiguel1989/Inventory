<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $post = user::get();

        return response()
            ->json($post)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');;
    }

    public function show($id)
    {
        $post = user::findOrFail($id);
        return view('user.show', ['id' => $post]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function add(Request $request)
    {
        $post = new user;
        $post->name = $request->input('name');
        $post->address = $request->input('address');
        $post->company = $request->input('company');
        $post->product = $request->input('product');
        $post->unities = $request->input('unities');
        $post->price = $request->input('price');

        $producto = Producto::find($post->product);

        if ($producto && $post->unities <= $producto->stock) {
            $producto->decrement('stock', $post->unities);
            $post->save();
            return response()->json(['message' => 'Venta asignada al cliente indicado'], 200);
        } else {
            return response()->json(['message' => 'No hay suficientes productos en stock'], 200);
        }
    }



    public function edit($id)
    {
        $post = user::findOrFail($id);
        return view('user.edit', ['id' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = user::findOrFail($id);
        $post->id = $request->input('id');
        $post->name = $request->input('name');
        $post->address = $request->input('address');
        $post->company = $request->input('company');
        $post->product = $request->input('product');
        $post->unities = $request->input('unities');
        $post->price = $request->input('price');

        $post->save();

        session()->flash('status', 'Objeto actualizado');
    }

    public function delete(user $id)
    {
        $id->delete();
    }

    public function replace(Request $request, $id)
    {
        $user = user::findOrFail($id);

        $user->stock = $request->input('stock');

        $user->save();
    }
}
