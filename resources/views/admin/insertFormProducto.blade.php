@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <div class=" mb-5">
        <a class="btn btn-success" href="">Nuevo Producto</a>
        <a class="btn btn-success" href="categorias">Ver Categorias</a>
    </div>
   
  

    <form method="POST" action="{{route('insertProducto')}} "  >
        @csrf  
        @method('POST')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nombe Producto</label>
          <input required type="text" class="form-control md-6" pattern=".{3,}"  maxlength="100" name="categoria" placeholder="Ingrese nombre producto" aria-describedby="emailHelp">

          <label for="exampleInputEmail1" class="form-label">Valor</label>
          <input type="number" min="1" pattern="^[0-9]+" class="form-control md-6"  name="valor" required placeholder="Ingrese valor" aria-describedby="emailHelp">
        
        </div>
        <button type="submit" class="btn btn-primary">Registrar Producto</button>
    </form>
</div>
@endsection
@endauth 


