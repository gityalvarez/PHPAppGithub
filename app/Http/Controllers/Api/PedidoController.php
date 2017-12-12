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
    public function index(/*Request $request*/Authorizer $authorizer)
    {
        //$cliente_id = User::where('email',$request->email)->first()->id;
        $cliente_id = $authorizer->getResourceOwnerId();
        $pedidos = Pedido::where('user_id', $cliente_id)->get()->toArray();
        //$pedidos = Pedido::all()->toArray();
        return response()->json($pedidos,200);
    }
    
    public function create(Request $request, Authorizer $authorizer){  
        $precios = Articulo::all()->select("precio")->toArray();
        //$stocks = Articulo::all()->select("stock")->toArray();
        $pedido = new Pedido();
        $pedido->estado = "creado";
        $cliente_id = $authorizer->getResourceOwnerId();
        $pedido->user_id = $cliente_id;
        $total = 0;
        for ($i=0; $i < count($request->articulos); $i++){
            if ($i == 0){
                $proximo = 0;
            }            
            else {
                $proximo ++;
            }            
            $encontrado = false;
            //dd(count($request->cantidades));
            while ($proximo < count($request->cantidades) && !$encontrado){
                if ($request->cantidades[$proximo] != ""){
                    $encontrado = true;
                }
                else {
                    $proximo ++;
                }
            }            
            $articulo = Articulo::find($request->articulos[$i]);
            $articulo->stock = $articulo->stock - $request->cantidades[$proximo];
            $articulo->save();
            //dd($request->precios[$proximo]);
            $total = $total + ($precios[$proximo] * $request->cantidades[$proximo]);            
        }
        $pedido->total=$total;
        //dd($total);
        $pedido->save();
        $ultimopedido = Pedido::all()->last();
        for ($i=0; $i < count($request->articulos); $i++){
            if ($i == 0){
                $proximo = 0;
            }            
            else {
                $proximo ++;
            }   
            $encontrado = false;
            while ($proximo < count($request->cantidades) && !$encontrado){
                if ($request->cantidades[$proximo] != ""){
                    $encontrado = true;
                }
                else {
                    $proximo ++;
                }
            }
            $ultimopedido->articulos()->attach($request->articulos[$i], ['cantidad' => $request->cantidades[$proximo], 'created_at' => DB::raw('NOW()')]);            
        }        
    }
}