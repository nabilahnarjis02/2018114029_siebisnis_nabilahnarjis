<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
 
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
 
        return view('posts.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('posts.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_barang' => 'required',
            'rasa' => 'required',
            'jumlah_barang' => 'required|numeric',

        ]);
 
        Post::create($request->all());
 
        return redirect()->route('posts.index')
                        ->with('success','Stock created successfully.');
    }
 
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
 
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }
 
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_barang' => 'required',
            'rasa' => 'required',
            'jumlah_barang' => 'required|numeric',
        ]);
 
        $post->update($request->all());
 
        return redirect()->route('posts.index')
                        ->with('success','Stock updated successfully');
    }
 
    public function destroy(Post $post)
    {
        $post->delete();
 
        return redirect()->route('posts.index')
                        ->with('success','Stock deleted successfully');
    }
}