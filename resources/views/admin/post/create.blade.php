@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              <h1>Crea nuovo post</h1>

              <form method="POST" action="{{route('admin.posts.store')}}">

                @csrf

                <div class="form-group">
                  <label for="category_id">Categoria</label>

                  {{-- select per categoria, al controller ho passato tutte le categorie in variabile $categories, ciclo for per stampare la select--}}
                  {{-- name e id category_id, ossia foreign_key --}}
                  <select class="form-control" id="category_id" name="category_id">
          
                  <option value="">Nessuna categoria... </option>
          
                    @foreach ($categories as $category)
                      <option {{old('category_id') == $category->id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
          
                  </select>
                </div>

                <div class="form-group">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>

                <div class="form-group">
                  <label for="content">Contenuto post</label>
                  <textarea class="form-control" id="content" name="content" rows="10" {{old('content')}}></textarea>
                </div>


                {{-- checkbox per tags, stampo una checkbox per ogni tag --}}
                @foreach ($tags as $tag)

                  {{-- id, for e valu impostati su $tag->id --}}
                  <div class="custom-control custom-checkbox">
                    {{-- GESTIONE NAME: nel campo name mettiamo un array vuoto-> diamo la istruzione a html di restituirci un array con i valori check passati(nel caso gli $tag->id) --}}
                    {{-- GESTIONE OLD: verifico in array tagsId è presente $tag->id, nel caso imposto su checked altrimenti no --}}
                    <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array(   $tag->id,    old('tags', [])   )?'checked':''}}>
                    <label class="custom-control-label" for="tag_{{$tag->id}}">   {{$tag->name}}    </label>
                  </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Invia</button>

              </form>


            </div>
        </div>
    </div>
@endsection