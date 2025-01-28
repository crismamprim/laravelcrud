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
    <br>
    <div class="container text-center">
      <div>
        <div class="row">
          <div class="col">
            
          </div>
          <div class="col">
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card">
              <h5 class="card-header">{{ $treinamento->norma }} - {{ $treinamento->descricao }}</h5>
              <div class="card-body">
                <h5 class="card-title text-primary">{{ $treinamento->funcionario }}</h5>
                <p class="card-text"><strong>Data do treinamento: </strong>{{ \Carbon\Carbon::parse($treinamento->data)->format('d M Y') }}</p>
                <span class="badge rounded-pill text-bg-info">Validade: {{ \Carbon\Carbon::parse($treinamento->validade)->format('d M Y') }}</span>
                <br>
                <span class="badge rounded-pill text-bg-info">Vence em: {{ $diferenca }}</span>
                
                <br>
                <br>
        
                <form action="{{ route('destroy', ['treinamento' => $treinamento]) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Tem certeza de deseja apagar este registro ?')" class="btn btn-danger">Deletar</button>
                </form>
                <hr>
                <h6 class="fs-5">Log de ações</h6>
                <h6 class="fs-6">Criado: {{ \Carbon\Carbon::parse($treinamento->created_at)->format('d M Y') }}</h6>
                <h6 class="fs-6">Modificado: {{ \Carbon\Carbon::parse($treinamento->updated_at)->format('d M Y') }}</h6>
                <br>
                <a href="{{ route('listar') }}" class="btn btn-success">Voltar</a>
              </div>
            </div>
          </div>
          <div class="col">
            
          </div>
        </div>
      </div>       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>