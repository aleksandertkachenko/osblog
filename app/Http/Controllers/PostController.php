<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    public function index(Request $request) {
        $posts = Posts::orderBy('created_at', 'DESC');

        $this->validate($request, [
            'textsearch' => 'string|min:3|max:64',
        ]);

        $textsearch = $request->input('textsearch');

        if (isset($textsearch)) {
            $posts = $posts->where('title', 'like', '%'.$textsearch.'%')->get();
        }
        else {
            $posts = $posts->get();
        }

        $data = ['posts'=>$posts,'textsearch'=>$textsearch];
        return view('listposts',$data);
    }

    public function create() {
        return view('createpost');
    }

   
    public function store(Request $request) {

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $post = new Posts();
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $image = $request->file('image');
        if ($image) {
            $path = Storage::putFile('public', $image);
            $post->image = Storage::url($path);
        }
        $post->save();
        return redirect()->route('listposts')->with('success', "Post added");
    }

    public function destroy($id) {
        

        Posts::destroy($id);

        return redirect()->route('listposts')->with('success', 'Post deleted');
    }
}