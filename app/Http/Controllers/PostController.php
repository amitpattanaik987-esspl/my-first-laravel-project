<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\PostWithDb;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        // $posts = PostWithDb::with(['category', 'author'])->get(); //used WITH to avoid the clockwork n+1 problem

        return view('posts.index', [
            // 'posts' => $posts->get(), // that get method was ran here to get final posts 

            'posts' => PostWithDb::latest()->filter()->paginate(6)->withQueryString()

            // withQueryString() -> this function work is when you will select any category then under category there is any pagnation mean there is more than 6 value then  when  we will click on page 2 of that category then the it will actually render to the page 2 of that category or else it will navigate to page 2 of all category
        ]);
    }
    public function show(PostWithDb $post)
    {

        // $post1 = postwithdb::find($post);

        return view('posts.show', [
            'posts' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()

    {
        $isOther = request()->filled('Other_Category');

        $validated = request()->validate(array_merge([
            'title' => 'required|min:3|max:300',
            'excerpt' => 'required|min:3|max:500',
            'thumbnail' => 'required|image',
            'slug' => 'required|min:3|max:500|unique:post_with_db,slug',
            'body' => 'required',
        ], $isOther ? [
            'Other_Category' => 'required|string|max:255',
            'category_slug' => 'required|string|max:255|unique:categories,slug',
        ] : [
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]));

        if ($isOther) {
            $newCategory = category::create([
                'name' => $validated['Other_Category'],
                'slug' => $validated['category_slug'],
            ]);

            $validated['category_id'] = $newCategory->id;

            unset($validated['Other_Category'], $validated['category_slug']);
        }

        $validated['user_id'] = auth()->id();
        $validated['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');

        $post = PostWithDb::create($validated);

        return $post
            ? redirect('/')->with('success', 'Post Created !!')
            : back()->with('error', 'Internal Server Error !!');
    }
}
