<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produtos;

class ProdutoController extends Controller
{

    private $qtdPorPagina = 5;

    public function __construct()
    {
        //Documentação do Spatie
        //https://docs.spatie.be/laravel-permission/v3/introduction/

        $this->middleware(  'permission:produtos-list|produtos-create|produtos-edit|produtos-delete',
                            ['only' => ['index', 'show']]);
        $this->middleware(  'permission:produtos-create',
                            ['only' => ['create', 'store']]);
        $this->middleware(  'permission:produtos-edit',
                            ['only' => ['edit', 'update']]);
        $this->middleware(  'permission:produtos-delete',
                            ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $prod = Produtos::orderBy('id', 'ASC')->paginate($this->qtdPorPagina);

        return view('produtos.index', compact('prod'))
                ->with('i', ($request->input('page', 1) - 1) * $this->qtdPorPagina);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [ 'nome'          => 'required',
                                    'descricao'     => 'required',
                                    'preco'         => 'required']);
        $input      = $request->all();
        $produto    = Produtos::create($input);

        return redirect()->route('produtos.index')->with('success', 'Produto gravado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produto = Produtos::find($id);

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produto = Produtos::find($id);

        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [ 'nome'          => 'required',
                                    'descricao'     => 'required',
                                    'preco'         => 'required']);

        $input      = $request->all();
        $produto    = Produtos::find($id);

        $produto->update($input);

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produtos::find($id)->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produtos removido com sucesso!');
    }
}
