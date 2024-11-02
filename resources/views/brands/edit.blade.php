@extends('layouts.app')

@section('content')
    <h1>{{ __('Editar Marca') }}</h1>

    <form action="{{ route('brand.update', $brand->idBrand) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="199" required
                   value="{{ $brand->Name }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Atualizar Marca') }}</button>
    </form>
@endsection
