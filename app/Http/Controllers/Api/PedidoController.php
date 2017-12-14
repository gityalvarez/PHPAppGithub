<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Backend\Pedido;
use App\Models\Backend\Articulo;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
Use DB;
use LucaDegasperi\OAuth2Server\Authorizer;

class PedidoController extends Controller
{
    public function index(/*Request $request,*/ Authorizer $authorizer)
    {
        //$cliente_id = User::where('email',$request->email)->first()->id;
        $cliente_id = $authorizer->getResourceOwnerId();
        $pedidos = Pedido::where('user_id', $cliente_id)->get()->toArray();
        return response()->json($pedidos,200);
    }
    
    public function create(Request $request, Authorizer $authorizer){  
        $stocks = json_decode($request->stocks, true);
        $articulos = json_decode($request->articulos, true);
        $precios = json_decode($request->precios, true);
        $cantidades = json_decode($request->cantidades, true);
        $i = 0;
        $cantidadesnoseteadas = false;
        while (($i < count($articulos)) && (!$cantidadesnoseteadas)){
            if ($cantidades[$i] <> 0){
                $cantidadesnoseteadas = true;
            }
            else {
                $i++;
            }
        }
        $cantidadesinvalidas = false;
        while (($i < count($articulos)) && (!$cantidadesinvalidas)){
            if ($cantidades[$i] > $stocks[$i]){
                $cantidadesinvalidas = true;
            }
            else {
                $i++;
            }
        }
        if (($cantidadesnoseteadas) && (!$cantidadesinvalidas)){
        $pedido = new Pedido();
        $pedido->estado = "creado";
        $cliente_id = $authorizer->getResourceOwnerId();
        $pedido->user_id = $cliente_id;
        $total = 0;
        for ($i=0; $i < count($articulos); $i++){
          if ($cantidades[$i] <> 0){            
            $articulo = Articulo::find($articulos[$i]);
            $articulo->stock = $articulo->stock - $cantidades[$i];
            $articulo->save();            
            $total = $total + ($articulo->precio * $cantidades[$i]); 
          }  
        }
        $pedido->total=$total;
        $pedido->save();
        $ultimopedido = Pedido::all()->last();
        for ($i=0; $i < count($articulos); $i++){
          if ($cantidades[$i] <> 0){ 
            $ultimopedido->articulos()->attach($articulos[$i], ['cantidad' => $cantidades[$i], 'created_at' => DB::raw('NOW()')]);            
          }  
        }
        }             
    }
    
    public function show($id)
    {
        $pedido = Pedido::find($id);
        $articulos = $pedido->articulos()->get();
        return response()->json($articulos,200);
    }
}