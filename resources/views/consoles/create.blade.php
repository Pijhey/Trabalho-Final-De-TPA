@extends('layouts.app')

@section('content')
    <h1>{{ __('Criar Novo Console') }}</h1>

    <form action="{{ route('console.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="model" class="form-label">{{ __('Modelo') }}</label>
            <input type="text" name="model" id="model" class="form-control" maxlength="100" required>
            @error('model')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">{{ __('Marca') }}</label>
            <select class="form-select" name="brand" id="brand" required>
                <option selected></option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->idBrand }}">{{ $brand->Name }}</option>
                @endforeach
            </select>
            @error('brand')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Preço') }}</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Criar Console') }}</button>
    </form>
@endsection
