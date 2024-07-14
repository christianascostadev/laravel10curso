<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr as FacadesToastr;
use Brian2694\Toastr\Toastr;
use Brian2694\Toastr\ToastrServiceProvider;
use resources\views\pages\produtos\create;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;


class ProdutosController extends Controller
{
    private $produto;
    public function __construct(Produto $produto)
    {
        $this->produto=$produto;
    }
    
    public function index(Request $request)
    {
        $pesquisar =$request->pesquisar;
        $findProduto = $this->produto->getProdutosPerquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function cadastrarProduto(FormRequestProduto $request)
    {    
        if ($request->method() == "POST")
        {
            // Persiste os dados
            $data=$request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produto::create($data);
            FacadesToastr::success('Gravado com sucesso');
            return redirect()->route('index');
            
        }
        //Mostra os dados
        return view('pages.produtos.create');

    } 

    public function atualizarProduto(FormRequestProduto $request, $id)
    {    
        if ($request->method() == "PUT")
        {
            // Atual.izar os dados do produto
            $data=$request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscaRegisto = Produto::find($id);
            $buscaRegisto->update($data);
            FacadesToastr::success("Atualizado!");
            return redirect()->route('index');
            
        }
        //Mostra os dados
        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));

    } 
    
    public function delete(Request $request)
    {
        $id =  $request->id;
        $buscaRegisto = Produto::find($id);
        $buscaRegisto->delete();
        
        return response()->json(['sucess' => true]);
        
    }
}
