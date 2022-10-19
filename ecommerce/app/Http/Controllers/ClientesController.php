<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Clientes;

use Spatie\Permission\Models\Role;


class ClientesController extends Controller
{
    //use Illuminate\Http\Request;

    private $qtdPorPagina = 5;

    public function __construct()
    {
        //Documentação do Spatie
        //https://docs.spatie.be/laravel-permission/v3/introduction/

        $this->middleware(  'permission:clientes-list|clientes-create|clientes-edit|clientes-delete',
                            ['only' => ['index', 'show']]);
        $this->middleware(  'permission:clientes-create',
                            ['only' => ['create', 'store']]);
        $this->middleware(  'permission:clientes-edit',
                            ['only' => ['edit', 'update']]);
        $this->middleware(  'permission:clientes-delete',
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
        $cli = Clientes::orderBy('id', 'ASC')->paginate($this->qtdPorPagina);
        return view('clientes.index', compact('cli'))->with('i', ($request->input('page', 1)-1) * $this->qtdPorPagina);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
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
        $this->validate($request, [ 'nome'      => 'required',
                                    'email'     => 'required|email']);
        $input      = $request->all();
        $cliente    = Clientes::create($input);

        return redirect()->route('clientes.index')->with('success', 'Cliente gravado com sucesso!');
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
        $cliente = Clientes::find($id);

        return view('clientes.show', compact('cliente'));

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

        $cliente = Clientes::find($id);

        return view('clientes.edit', compact('cliente'));
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
        $this->validate($request, [ 'nome'      => 'required',
                                    'email'     => 'required|email']);

        $input      = $request->all();
        $cliente    = Clientes::find($id);

        $cliente->update($input);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente atualizado com sucesso!');

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

        Clientes::find($id)->delete();

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente removido com sucesso!');

    }
}
