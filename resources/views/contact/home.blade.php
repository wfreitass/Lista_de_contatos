@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-center">Lista de Contatos</h3>
            @can('is_logged')
                <div class="mb-3 d-flex justify-content-end">
                    <a href="{{ route('contact-create') }}" class="btn btn-primary">Adicionar um Novo Contato</a>
                </div>
            @endcan
            @can('is_logged')
            @endcan

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($contacts->count())
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contato</th>
                                @can('is_logged')
                                    <th scope="col">Ações</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    @can('is_logged')
                                        <td class="d-flex w-100">
                                            <a href="{{ route('contact-show', ['id' => $contact->id]) }}"
                                                class="btn btn-success">Visualizar</a>
                                            <form action="{{ route('contact-destroy', ['id' => $contact->id]) }}" method="post"
                                                class="form-delete mx-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-delete">Excluir</button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning text-center" role="alert">
                        Nenhum contato registrado !!!
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
