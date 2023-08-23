@extends('administracion')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Usuarios')}}</div>
                <div class="card-body">
                @if(Session('status'))
                    <div class="alert alert-success">
                        {{ Session('status') }}
                    </div>
                @endif
                    <table class="table table-rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Es admin</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @if($users->count() > 0)
                            @foreach($users as $key)
                            <tr>
                                <td>{{ $key->name }}</td>
                                <td>{{ $key->email }}</td>
                                <td>
                                @if($key->is_admin == 1)
                                    Si
                                @else
                                    No
                                @endif
                                </td>
                                <td>
                                    <form action="{{ route('usuarios.giveAdminRole', ['id' => $key->id]) }}" class="form_dar" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-give-admin">Darle Admin</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('usuarios.revokeAdminRole', ['id' => $key->id]) }}" class="form_quitar" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-revoke-admin">Quitarle Admin</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No se han encontrado registros</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/administracion/usuarios.js'])

@endsection
