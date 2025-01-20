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
      
        <div class="row">
          <div class="col">
            
          </div>
          <div class="col-8">
            @if ($errors->any())
        
            @foreach ($errors->all() as $erro)
              <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div>
                  {{ $erro }}
                </div>
              </div>
              
            @endforeach
          
        @endif
  
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <form action="{{ route('cadastrar') }}" method="POST">
          @csrf
          
          <div class="mt-5">
              <div class="border">
                  <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Instrutor</label>
                      <input class="form-control" name="instrutor" type="text" placeholder="Instrutor" aria-label=".form-control-lg example" value="{{ old('instrutor') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Empresa</label>
                      <input class="form-control" name="empresa" type="text" placeholder="Empresa" aria-label=".form-control-lg example" value="{{ old('empresa') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Funcionario</label>
                      <input class="form-control" name="funcionario" type="text" placeholder="Funcionario" aria-label=".form-control-lg example" value="{{ old('funcionario') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Norma</label>
                      <input class="form-control" name="norma" type="text" placeholder="Norma" aria-label=".form-control-lg example" value="{{ old('norma') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Descrição</label>
                      <input class="form-control" name="descricao" type="text" placeholder="Descrição" aria-label=".form-control-lg example" value="{{ old('descricao') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Data</label>
                      <input class="form-control" name="data" type="date" aria-label=".form-control-lg example" value="{{ old('data') }}">
                    </div>
                    <div class="mb-3 m-4">
                      <label for="formGroupExampleInput" class="form-label fw-semibold">Validade</label>
                      <input class="form-control" name="validade" type="date" aria-label=".form-control-lg example" value="{{ old('validade') }}">
                    </div>
                 
                    <button type="submit" class="btn btn-success m-4">Cadastar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
              </div>
              
            </div>
        </form>
          </div>
          <div class="col">
            
          </div>
        </div>
     
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>