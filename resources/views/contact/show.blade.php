@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center">Visualizando Contato</h3>
        </div>

        <div class="container">
            <div class="row ">
                <form action="{{ route('contact-salve') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ $contact->name }}" name="name" disabled>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                value="{{ $contact->email }}" name="email" disabled>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <label for="contact" class="form-label">Contato</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" maxlength="9"
                                id="contact" value="{{ $contact->contact }}" name="contact" disabled>
                            @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 mt-3">
                            <a href="{{ route('contact-edit', ['id' => $contact->id]) }}" class="btn btn-primary">
                                Editar
                            </a>
                        </div>
                    </div>
                </form>
                <div class="row mt-3">
                    @if (flash()->message)
                        <div class="{{ flash()->class }}">
                            <div class="alert alert-warning" role="alert">
                                {{ flash()->message }}
                            </div>

                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
