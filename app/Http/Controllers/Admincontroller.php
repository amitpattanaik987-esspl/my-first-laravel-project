<?php

namespace App\Http\Controllers;

use App\Models\PostWithDb;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Admincontroller extends Controller
{
    public function index()
    {
        //other than the middleware like where i used superadmin we can also use the gate to apply authorization in any page like this 
        // $this->authorize('admin')
        return view('admin.show', [
            "posts" => PostWithDb::latest()->paginate(20)
        ]);
    }


    public function edit(PostWithDb $post)
    {
        return view('admin.edit', [
            "posts" => $post
        ]);
    }

    public function update(PostWithDb $post)
    {

        try {
            $data = request()->validate([
                'title' => 'required|min:3|max:300',
                'excerpt' => 'required|min:3|max:500',
                'thumbnail' => 'image',
                'slug' => ['required', 'min:3', 'max:500', Rule::unique('post_with_db', 'slug')->ignore($post->id)],
                'body' => 'required',
                'category_id' => ['required', Rule::exists('categories', 'id')],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }

        if (isset($data['thumbnail'])) {
            $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($data);
        return back()->with('success', 'Post Updated !!');
    }

    public function destroy(PostWithDb $post)
    {
        $post->delete();

        return back()->with('success', $post->title . ' Post Deleted');
    }
}
