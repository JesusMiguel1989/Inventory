<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        $productos = Producto::get();

        $resultados = DB::table('client')->get();

        foreach ($productos as $producto) {
            $ventas = 0;

            foreach ($resultados as $registro) {
                if ((int)$producto->id == $registro->product) {
                    $ventas += $registro->unities;
                }
            }

            Producto::where('id', $producto->id)->update([
                'nombre' => $producto->nombre,
                'color' => $producto->color,
                'foto' => $producto->foto,
                'stock' => $producto->stock,
                'precio' => $producto->precio,
                'ventas' => $ventas,
            ]);
        }

        $productosActualizados = Producto::get();

        return response()
            ->json($productosActualizados)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function show($id)
    {
        $post = Producto::findOrFail($id);
        return view('producto.show', ['id' => $post]);
        //return response()->json($post);
        /*return response()
            ->json($post)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');*/
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $post = new Producto;
        $post->nombre = $request->input('nombre');
        $post->color = $request->input('color');
        $post->foto = $request->input('foto');
        $post->stock = $request->input('stock');
        $post->precio = $request->input('precio');
        $post->ventas = $request->input('ventas');

        $post->save();

        session()->flash('status', 'Objeto creado');
    }


    public function edit($id)
    {
        $post = Producto::findOrFail($id);
        return view('producto.edit', ['id' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Producto::findOrFail($id);
        $post->id = $request->input('id');
        $post->nombre = $request->input('nombre');
        $post->color = $request->input('color');
        $post->foto = $request->input('foto');
        $post->stock = $request->input('stock');
        $post->precio = $request->input('precio');
        $post->ventas = $request->input('ventas');

        $post->save();

        session()->flash('status', 'Objeto actualizado');

        return redirect('/product');
        //return view('producto.store');
    }

    public function delete(Producto $id)
    {
        $id->delete();
        $clients = User::where('product', $id->id)->get();
        foreach ($clients as $client) {
            $client->delete();
        }
    }

    public function replace(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->stock = $request->input('stock');

        $producto->save();

        session()->flash('status', 'Stock actualizado correctamente');
        //return redirect('/product');
    }
}
