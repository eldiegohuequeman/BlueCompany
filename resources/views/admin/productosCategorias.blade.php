@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <a class="btn btn-success" href="/home">Atras</a>
  
    @if ( session('mensaje') )
    <div class="alert alert-warning">{{ session('mensaje') }}</div>
    @endif
    @if ( session('mensajeDelete') )
    <div class="alert alert-danger">{{ session('mensajeDelete') }}</div>
    @endif
    @if ( session('mensajeInsert') )
    <div class="alert alert-primary">{{ session('mensajeInsert') }}</div>
    @endif
    <div class="mt-5 mb-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Categoria</th>
                <th scope="col">Acciones</th>
                <th scope="col">Porducto: {{$productos->nombre}}</th>
                <th scope="col">Valor: {{$productos->valor}} </th>
         
              </tr>
            </thead>
            @foreach ($categorias as $data)
            @if ($data->nombre==="alimento")
            <tbody class="table-group-divider">
                <tr>
                  <th>{{$data->nombre}}</th>
                  <th>
                      <form method="POST" action="{{url('insertProductoCategoria', ['pro' => $productos->id, 'cat' => $data->id])}}">
                        <input type="date" required name="fecha">
                          <button type="submit" class="btn btn-primary">Asignar Categoria</button>
                          @csrf  
                          @method('POST')
                        </form>
                  </th>
                  <th></th>
                  <td>
           
                  </td>
  
                </tr>
         
              </tbody>
            @else
                
            <tbody class="table-group-divider">
              <tr>
                <th>{{$data->nombre}}</th>
                <th>
                    <form method="POST" action="{{url('insertProductoCategoria', ['pro' => $productos->id, 'cat' => $data->id])}}">
                        <button type="submit" class="btn btn-primary">Asignar Categoria</button>
                        @csrf  
                        @method('POST')
                      </form>
                </th>
                <th></th>
                <td>
         
                </td>

              </tr>
       
            </tbody>
            @endif
            @endforeach
          </table>
    </div>

</div>
@endsection
@endauth 
