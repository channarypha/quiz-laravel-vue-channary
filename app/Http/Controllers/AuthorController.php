<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Author::take(3)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $post = new Author();
        // $post-> name = $request-> name;
        // $post->age = $request->age;
        // $post->province = $request-> province;
        // $post-> save();
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'province' => 'required',
        ]);

        return response()->json(['message' => 'created!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Author::findOrFail($id);
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
        $post = Author::findOrFail($id);
        $post-> name = $request-> name;
        $post->age = $request->age;
        $post->province = $request-> province;
        $post-> save();

        return response()->json(['message' => 'updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Author::destroy($id);

        if ($isDelete == 1) 
            return response()->json(['message' => 'Author deleted successfully !'], 200);

        return response()->json(['message' => 'ID NOT EXIT'], 404);
    }
}
