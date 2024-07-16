@extends('index')

    @section('content')
        
         
        <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">
            
            @csrf          
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Cadastrar um nova Venda</h1>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Numeração da Venda</label>
                <input type="text" disabled value="{{$findNumeracao}}" value="{{old('numero_da_venda')}}"  class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda">
                @if ($errors->has('numero_da_venda'))
                    <div class="invalid-feedback">{{$errors->first('numero_da_venda')}}</div>                    
                @endif    
                

            </div>
            
            <div class="mb-3">
                <label class="form-label">Produto</label>
                <select class="form-select" aria-label="default select exemple" name="produto_id">
                    <option selected>Escolha uma opção</option>
                    @foreach ($findProduto as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                    
                </select>
            </div>  
            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select class="form-select" aria-label="default select exemple" name="cliente_id">
                    <option selected>Escolha uma opção</option>
                    @foreach ($findCliente as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>    

            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>

    @endsection