<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Componentes;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr as FacadesToastr;

use resources\views\pages\clientes\create;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;


class ClientesController extends Controller
{
    private $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente=$cliente;
    }
    
    public function index(Request $request)
    {
        $pesquisar =$request->pesquisar;
        $findCliente = $this->cliente->getClientesPerquisarIndex(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function cadastrarCliente(FormRequestCliente $request)
    {    
        if ($request->method() == "POST")
        {
            // Persiste os dados
            $data=$request->all();
            //$componentes = new Componentes();
            
            Cliente::create($data);
            FacadesToastr::success('Gravado com sucesso');
            return redirect()->route('clientes.index');
            
        }
        //Mostra os dados
        return view('pages.clientes.create');

    } 

    public function atualizarCliente(App\Http\Controllers\FormRequestCliente $request, $id)
    {    
        if ($request->method() == "PUT")
        {
            // Atual.izar os dados do produto
            $data=$request->all();
            $componentes = new Componentes();
            
            $buscaRegisto = Cliente::find($id);
            $buscaRegisto->update($data);
            FacadesToastr::success("Atualizado!");
            return redirect()->route('index');
            
        }
        //Mostra os dados
        $findCliente= Cliente::where('id', '=', $id)->first();
        return view('pages.clientes.atualiza', compact('findCliente'));

    } 
    
    public function delete(Request $request)
    {
        $id =  $request->id;
        $buscaRegisto = Cliente::find($id);
        $buscaRegisto->delete();
        
        return response()->json(['sucess' => true]);
        
    }
}
