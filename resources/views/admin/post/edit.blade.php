@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              <h1>Modifica post</h1>

              <form method="POST" action="{{route('admin.posts.update', $post->id)}}">

                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="category_id">Categoria</label>

                  {{-- select per categoria, al controller ho passato tutte le categorie in variabile $categories, ciclo for per stampare la select--}}
                  {{-- name e id category_id, ossia foreign_key --}}
                  <select class="form-control" id="category_id" name="category_id">
          
                  <option value="">Nessuna categoria... </option>
          
                    @foreach ($categories as $category)
                      <option {{(old('category_id', $post->category_id) == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
          
                  </select>
                </div>

                <div class="form-group">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                </div>

                <div class="form-group">
                  <label for="content">Contenuto post</label>
                  <textarea class="form-control" placeholder="Inserisci il post qui" id="content" name="content" cols="50" rows="10">{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>

              </form>


            </div>
        </div>
    </div>
@endsection