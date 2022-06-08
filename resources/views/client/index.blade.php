@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="text-white">Listado de clientes</h1>
        <div class="text-end">
            <a href="{{ route('client.create')}}" class="btn btn-primary mb-3"> Crear cliente </a>
        </div>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table table-dark table-borderless table-responsive">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->due}}</td>
                        <td> 
                            <a href="{{route('client.edit', $detail)}}" class="btn btn-warning">Editar</a> 
                            <form action="{{route('client.destroy', $detail)}}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onClick="return confirm('Esta seguro de eliminar este cliente?')">Eliminar</button>
                            </form>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay registros para mostrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($clients->count())
            {{ $clients->links() }}
        @endif
    </div>
@endsection

