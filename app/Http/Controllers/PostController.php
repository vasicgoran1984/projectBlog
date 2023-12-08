<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $posts = Post::all();

        $posts = Post::paginate(5);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
           'title' => 'required|max:60',
            'slug' => 'required|alpha_dash|min:3|max:120',
            'category_id' => 'required|numeric',
            'body' => 'required',
            'feature_image' => 'sometimes|image',
        ));

//        dd(Auth::user()->id);
//        echo '<pre>';
//        print_r(Auth::user()->id);
//        echo '</pre>';
//        die('f');

        $userId = Auth::user()->id;

        $post = new Post;
        $post->user_id = $userId;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = $request->body;

        // Save image
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

//        echo '<pre>';
//        print_r($post);
//        echo '</pre>';
//        die('f');

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The Blog Successfully Saved!');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
//        echo '<pre>';
//        print_r($post->category->name);
//        echo '</pre>';
//        die('d');
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        $cat = [];
        foreach ($categories as $category) {
            $cat[$category->id] = $category->name;
        }

//        echo '<pre>';
//        print_r($cat);
//        echo '</pre>';
//        die('c');

        $allTags = Tag::all();
        $tags = [];

        foreach ($allTags as $tag) {
            $tags[$tag->id] = $tag->name;
        }

        return view('posts.edit')
                ->withPost($post)
                ->withCategories($cat)
                ->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:60',
                'body' => 'required',
                'category_id' => 'required|numeric',
                'feature_image' => 'image',
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:60',
                'slug' => 'required|alpha_dash|min:3|max:120|unique:posts,slug',
                'body' => 'required',
                'category_id' => 'required|numeric',
                'feature_image' => 'image',
            ));
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        // Save image
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldImage = $post->image;

            $post->image = $filename;
            // Delete old image
            Storage::delete($oldImage);
        }

//        echo '<pre>';
//        print_r($post);
//        echo '</pre>';
//        die('f');

        $post->save();

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }

        Session::flash('success', 'The Blog Successfully Saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        // Delete the image for post
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The Blog Successfully Deleted!');

        return redirect()->route('posts.index');
    }
}
