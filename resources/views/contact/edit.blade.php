@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center">Editando Contato</h3>
        </div>

        <div class="container">
            <div class="row ">
                <form action="{{ route('contact-update', ['id' => $contact->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ $contact->name }}" name="name">
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
                                value="{{ $contact->email }}" name="email">
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
                                id="contact" value="{{ $contact->contact }}" name="contact">
                            @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 mt-3">
                            <button class="btn btn-primary">
                                Salvar
                            </button>
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
