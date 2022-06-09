@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <div class=" mb-5">
        <a class="btn btn-success" href="">Nuevo Producto</a>
        <a class="btn btn-success" href="/categorias">Ver Categorias</a>
    </div>
   
  

    <form method="POST" action="{{route('updateProducto',$producto->id)}}">
        @csrf  
        @method('PUT')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombe Categoria</label>
          <input type="text" class="form-control md-6" id="nombre" name="nombre" placeholder="{{$producto->nombre}}" aria-describedby="emailHelp">

          <label for="exampleInputEmail1" class="form-label">Valor</label>
          <input type="text" class="form-control md-6" id="valor" name="valor" placeholder="{{$producto->valor}}" aria-describedby="emailHelp">
        
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
@endauth 
