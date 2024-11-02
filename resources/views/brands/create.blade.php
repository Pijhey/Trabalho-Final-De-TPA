@extends('layouts.app')

@section('content')
    <h1>{{ __('Criar Nova Marca') }}</h1>

    <form action="{{ route('brand.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="199" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Criar Marca') }}</button>
    </form>
@endsection
