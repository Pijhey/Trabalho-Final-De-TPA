@extends('layouts.app')

@section('content')
    <h1>{{ __('Editar Console') }}</h1>

    <form action="{{ route('console.update', $console->idConsole) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="model" class="form-label">{{ __('Modelo') }}</label>
            <input type="text" name="model" id="model" class="form-control" maxlength="100" value="{{ old('model', $console->Model) }}" required>
            @error('model')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">{{ __('Marca') }}</label>
            <select class="form-select" name="brand" id="brand" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->idBrand }}" @if($console->idBrand == $brand->idBrand) selected @endif>
                        {{ $brand->Name }}
                    </option>
                @endforeach
            </select>
            @error('brand')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Preço') }}</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $console->Price) }}" required>
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Atualizar Console') }}</button>
    </form>
@endsection
