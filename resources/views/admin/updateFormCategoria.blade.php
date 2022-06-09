@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <div class=" mb-5">
        <a class="btn btn-success" href="">Nuevo Categoria</a>
        <a class="btn btn-success" href="/home">Ver Productos</a>
    </div>
   
  

    <form method="POST" action="{{route('updateCategoria',$categoria->id)}}">
        @csrf  
        @method('PUT')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombe Categoria</label>
          <input type="text" class="form-control md-6" id="categoria" name="categoria" placeholder="{{$categoria->nombre}}" aria-describedby="emailHelp">
        
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
@endauth 
