<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificadoRequest;
use App\Models\Certificado;
use App\Models\Situacao;
use App\Models\Treinamento;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    public function treinamento()
    {
        $situacaoTreinamento = Situacao::orderby('nome', 'asc')->get();

        return view('treinamento', [
            'situacaoTreinamento' => $situacaoTreinamento,
        ]);
    }

    public function listar(Request $request)
    {
        $treinamento = treinamento::when($request->has('nome'), function($whenQuery) use ($request){
            $whenQuery->where('funcionario', 'like', '%' . $request->nome . '%');
        })
        ->when($request->filled('dataInicio'), function ($whenQuery) use ($request){
            $whenQuery->where('data', '>=', \Carbon\Carbon::parse($request->dataInicio)->format('Y-m-d'));
        })
        ->when($request->filled('dataFim'), function ($whenQuery) use ($request){
            $whenQuery->where('data', '<=', \Carbon\Carbon::parse($request->dataFim)->format('Y-m-d'));
        })
        ->with('situacao')
        ->orderByDesc('norma')
        ->paginate(15)
        ->withQueryString();

      //  dd($treinamento);

        return view('listar', [
            'treinamento' => $treinamento, 
            'nome' => $request->nome,
            'dataInicio' => $request->dataInicio,
            'dataFim' => $request->dataFim]);
    }

    public function visualizar(Treinamento $treinamento)
    {
        return view('visualizar', ['treinamento' => $treinamento ]);
    }

    public function cadastrar(CertificadoRequest $request)
    {   
        //validar formulario
        $request->validated();

       // Treinamento::create([$request->all()]);
        
        Treinamento::create([
            'instrutor' => $request->instrutor,
            'empresa' => $request->empresa,
            'funcionario' => $request->funcionario,
            'norma' => $request->norma,
            'descricao' => $request->descricao,
            'st_treinamento_id' => $request->st_treinamento_id,
            'data' => $request->data,
            'validade' => $request->validade
        ]);
        
        return redirect()->route('treinamento')->with('success','Treinamento cadastrado com sucesso!!!');
    }

    public function editar(Treinamento $treinamento)
    {
        return view('editar', ['treinamento' => $treinamento ]);
    }

    public function update(CertificadoRequest $request, Treinamento $treinamento)
    {
        $request->validated();

        $treinamento->update([
            'instrutor' => $request->instrutor,
            'empresa' => $request->empresa,
            'funcionario' => $request->funcionario,
            'norma' => $request->norma,
            'descricao' => $request->descricao,
            'data' => $request->data,
            'validade' => $request->validade
        ]);

        return redirect()->route('visualizar', ['treinamento' => $treinamento->id])->with('success','Treinamento alterado com sucesso!!!');
    }

    public function destroy(Treinamento $treinamento)
    {
        $treinamento->delete();

        return redirect()->route('visulizar')->with('success','Treinamento deletado com sucesso!!!');
    }
}
