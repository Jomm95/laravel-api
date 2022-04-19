<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

//per usare funzione per lo slug
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazioni
        $request->validate(
            [
                'title' => 'required|min:5',
                'content' => 'required|min:10',

                // accetto category_id se  esiste nella tabella categories alla colonna id
                "category_id"=>'nullable|exists:categories,id'
            ]
            );

            // prelevo dati dal form
            $data = request->all();

            //definisco lo slug - funzione laravel di STR (in alto: use Illuminate\Support\Str;)
            $slug = Str::slug($data['title']);

            //definisco funzione che fa si che lo slug non sia lo stesso se due titoli sono uguali.
            //imposto un counter, poi ciclo while: query sugli slug di post se trova corrispondenza fa un append allo slug del contatore,
            //incrementa il contatore. Se non trova corrispondenza esce dal ciclo while.
            $counter = 1;

            //potrei togliere "=" e sarebbe comunque un operatore di uguaglianza
            while(Post::where('slug', '=',  $slug)->first()){
                
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;

            }

            // inserisco lo slug dentro data
            $data['slug'] = $slug;

            //fill su post
            $post->fill($data);
            // salvo
            $post->save();

            //decido il redirect
            return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
