@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{ route('admin.posts.create')}}" class="btn btn-primary mb-3">Crea nuovo post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>

                    <tbody>
                        {{-- ciclo i posts per ognuno creo riga tabella --}}
                      @foreach ($posts as $post )
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            {{-- il contenuto mostro solo i primi 30 caratteri usando la funzione substr di php --}}
                            <td>{{ substr($post->content, 0, 30) }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{isset($post->category) ? $post->category->name : 'ND'}}</td>

                            {{-- <td>{{ $post->category->name }}</td> """"sintassi che non funzionava per category NULL""" --}}
                            
                            <td>
                              <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Vedi</a>
                              <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary">Modifica</a>

                              <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                @csrf {{-- token sicurezza --}}
                                @method('DELETE') {{-- metodo delete --}}
                                <button type='submit' class="btn btn-danger">Elimina</button>
                              </form>

                            </td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection