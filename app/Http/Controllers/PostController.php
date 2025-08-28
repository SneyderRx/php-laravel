<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // La mala practica porque tenemos
        // return response()->json(DB::table("post")->get());
        return $this->ok("Todo ok, como dijo el Pibe", Post::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$newPost = Post::created($request->only(['title', 'content', 'status']))->save();
        $newPost = Post::updateOrCreate(
            ['title' => $request->title], //La columna a comprar para la validación
            $request->only(['title', 'content', 'status']) //Las columnas a registrar o actualizar
        );
        return $this->ok('Todo melo mor', [$newPost]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Post::find($id);
        if($result) {
            return $this->ok("Todo bn, como dijo el Pibe", $result);
        } else {
            return $this->ok("Todo mal, como no dijo el Pibe", [], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
