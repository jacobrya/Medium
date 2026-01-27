<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $query = Post::latest();
        if($user){
            $ids = $user->following()->pluck('users.id');
            $query = $query->whereIn('user_id',$ids);

            }
        $posts = $query->simplePaginate(5);


        return view('post.index',[
            'posts'=> $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create',
        ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
         $data = $request->validated();
         $image = $data['image'];
         unset($data['image']);
         $data['user_id'] = auth()->id();


         $ImagePath = $image->store('posts','public');
         $data['image'] = $ImagePath;
         Post::create($data);

         return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $username,Post $post)
    {
        return view('post.show',[
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(auth()->id() !== $post->user_id){
            abort(403);
        }
        $categories = Category::get();
        return view('post.edit',[
            'post' => $post,
            'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if(auth()->id() !== $post->user_id){
            abort(403);
        }
        $data = $request->validated();
        $post->update($data);
        if($data['image'] ?? false){
            $image = $data['image'];
            $ImagePath = $image->store('posts','public');
            $post->image = $ImagePath;
            $post->save();

        }
        return redirect()->route('post.myPosts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(auth()->id() !== $post->user_id){
            abort(403);
        }
        $post->delete();
        return redirect()->route('post.myPosts');

    }
    public function myPosts()
    {
        $user = auth()->user();
        $posts = $user->posts()->latest()->simplePaginate(5);
        return view('post.my-index',[
            'posts'=> $posts
        ]);
    }
    public function category(Category $category)
    {
        $posts = $category->posts()->latest()->simplePaginate(5);
        return view('post.index',[
            'posts'=> $posts
        ]);
    }
}
