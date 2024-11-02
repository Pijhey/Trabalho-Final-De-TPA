@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{ __('Marcas Disponíveis') }}</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>{{ __('Nome') }}</th>
                @auth
                    <th>{{ __('Ações') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->Name }}</td>
                    @auth
                        <td>
                            <a href="{{ route('brand.edit', $brand->idBrand) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>

                            <form action="{{ route('brand.destroy', $brand->idBrand) }}" method="POST" class="d-inline">
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
