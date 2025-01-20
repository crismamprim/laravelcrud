<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
     @component('components.menu')
    @endcomponent
    <div class="container">
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <br>
        <h4>Treinamentos</h4>
        <div class="card mt-3 mb-4 border-light">
          <div class="card-header d-flex justify-content-between">
            <span>Pesquisar</span>
          </div>
          <div class="card-body">
            <form action="{{ route('listar') }}">
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <label class="form-label" for="nome">Nome</label>
                  <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome }}" placeholder="Nome">
                </div>
                <div class="col-md-3 col-sm-12">
                  <label class="form-label" for="dataInicio">Data Inicio</label>
                  <input type="date" name="dataInicio" id="dataInicio" class="form-control" value="{{ $dataInicio }}">
                </div>
                <div class="col-md-3 col-sm-12">
                  <label class="form-label" for="dataFim">Data Fim</label>
                  <input type="date" name="dataFim" id="dataFim" class="form-control" value="{{ $dataFim }}">
                </div>
                <div class="col-md-3 col-sm-12 mt-3 pt-3">
                  <button class="btn btn-info" type="submit">Pesquizar</button>
                  <a class="btn btn-secondary" href="{{ route('listar') }}">Limpar</a>
                </div>
              </div>
            </form>
          </div>
          
        </div>
        <br>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">Instrutor</th>
                <th scope="col">Empresa</th>
                <th scope="col">Funcionario</th>
                <th scope="col">Norma</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data</th>
                <th scope="col">Validade</th>
                <th scope="col">Situação</th>
                <th scope="col"></th>
                <th scope="col">Ações</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($treinamento as $treinamentos)
                    <tr>
                        <td>{{ $treinamentos->instrutor }}</td>
                        <td>{{ $treinamentos->empresa }}</td>
                        <td>{{ $treinamentos->funcionario }}</td>
                        <td>{{ $treinamentos->norma }}</td>
                        <td>{{ $treinamentos->descricao }}</td>
                        <td>{{ \Carbon\Carbon::parse($treinamentos->data)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($treinamentos->validade)->format('d M Y') }}</td>
                        
                        <td ><a class="btn btn-primary" href="{{ route('visualizar', ['treinamento' => $treinamentos]) }}">Visualizar</a></td>
                        <td ><a class="btn btn-warning" href="{{ route('editar', ['treinamento' => $treinamentos]) }}">Alterar</a></td>
                        
                        <form action="{{ route('destroy', ['treinamento' => $treinamentos]) }}" method="POST">
                          @csrf
                          @method('delete')
                          <td class="text-center text-danger"> 
                            <button type="submit" onclick="return confirm('Tem certeza de deseja apagar este registro ?')" class="btn btn-danger">Deletar
                              
                            </button> </td>
                      </form>
                      
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
          </table>
          {{ $treinamento->onEachSide(0)->links() }}
    </div>

</body>
</html>