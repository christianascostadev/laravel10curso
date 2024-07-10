@extends('index')

@section('content')

<class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      {{-- <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div> --}}
      {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button> --}}
    </div>
    <div>
        <form action="{{ route('index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome"/>
            <button>Pesquisar</button>
            <a type="button" href="" class="btn btn-success float-end">
                Incluir Produto
            </a>
        </form>
        <div class="table-responsive mt-4">
          @if ($findProduto->isEmpty())
            <p>Não existe dados</p>
          
          
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($findProduto as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ 'R$' . ' '. number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>
                            <a href="" class="btn btn-light btn-sm">
                                Editar
                            </a>
                            <a href="" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
                
              </tbody>
            </table> 
            @endif
          </div>
    </div>
  </div>
  @endsection   