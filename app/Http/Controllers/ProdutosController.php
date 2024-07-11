<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Produto;
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
            $data=$request->all();
            Produto::create($data);
            return redirect()->route('index');
            
        }
        return view('pages.produtos.create');

    } 
    
    public function delete(Request $request)
    {
        $id =  $request->id;
        $buscaRegisto = Produto::find($id);
        $buscaRegisto->delete();
        return response()->json(['sucess' => true]);
    }
}
