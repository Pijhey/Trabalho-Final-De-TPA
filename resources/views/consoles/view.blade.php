@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{ __('Consoles Disponíveis') }}</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ __('Modelo') }}</th>
                <th>{{ __('Marca') }}</th>
                <th>{{ __('Preço') }}</th>
                @auth
                    <th>{{ __('Ações') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach ($consoles as $console)
                <tr>
                    <td>{{ $console->Model }}</td>
                    <td>{{ $console->Brand->Name }}</td>
                    <td>{{ number_format($console->Price, 2, ',', '.') }} R$</td>
                    @auth
                        <td>
                            <a href="{{ route('console.edit', $console->idConsole) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>

                            <form action="{{ route('console.destroy', $console->idConsole) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Apagar') }}</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
