<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function view()
    {   
        $produtos = Produto::all();
        //dd($produtos);
        return view('produtos.view', ['produtos' => $produtos]);
        
    }
    public function cadastrar_produtos()
    {   
        return view('produtos.cadastro_produtos');
        //dd($produtos);
        
    }
    public function salvar_produtos(Request $request)
    {   
        
        Produto::create($request->all());
        return redirect()->route('produtos-view');
        //dd($produtos);
        
    }
    public function editar_produtos($id)
    {   
        
        $produtos = Produto::where('id', $id)->first();
        if(!empty($produtos))
        {
            return view('produtos.editar_produtos', ['produtos' => $produtos]);
        }
        else
        {
            return redirect()->route('produtos-view');
        }
        
    }
    public function atualizar_produtos(Request $request, $id)
    {   
        $data = [
            'nome' => $request->nome,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade,
            'validade' => $request->validade,
        ];

        Produto::where('id', $id) -> update($data);
        return redirect()->route('produtos-view');
        
    }
    public function excluir_produtos($id)
    {   

        Produto::where('id', $id) -> delete();
        return redirect()->route('produtos-view');
    }
    public function buscar_produtos(Request $request)
    {   

        $pesquisa = $request->input('pesquisa');
        $produtos = Produto::where('nome', 'LIKE', "%$pesquisa%")->get();

        return view('produtos.view', ['produtos' => $produtos]);
    }


}

