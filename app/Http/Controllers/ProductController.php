<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::select(
            'productos.codigo',
            'productos.nombre',
            'productos.precio',
            'marcas.nombre as marca_nombre'
        )
            ->join('marcas', 'productos.marca', '=', 'marcas.codigo')
            ->get();

        // dd($productos);
        return view('/products/show')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Branch::all();
        return view('products/create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request() ->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'marca' => 'required'
        ]); 

        Product::create($data);
        return redirect('/products/show');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $marcas = Branch::all();
        return view('products/update')->with(['marcas' => $marcas, 'producto' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         $data = request() ->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'marca' => 'required'
        ]); 

        $product -> nombre = $data['nombre'];
        $product -> precio = $data['precio'];
        $product -> marca = $data['marca'];
        $product-> updated_at = now();

        $product->save();

        return redirect('/products/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(array('res' => true));
    }
}
