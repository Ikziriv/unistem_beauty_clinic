<?php

namespace App\Modules\Post\Http\Controllers;

use DB;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Post\Post,
	Http\Controllers\Controller
};

class PostController extends Controller
{
	// view.backend.pages.post.index
	public function index()
	{
		$data['page_title'] = 'News & Advice';
		$data['post'] = Post::with('category')->get();
		
		return view('backend.pages.post.index', $data);
	}
	// view.backend.pages.post.category.create
	public function create()
	{
		$data['page_title'] = 'Create News & Advice';
		$data['category'] = DB::table('categories')->select('id', 'name')->get();
		return view('backend.pages.post.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();
        if ($request->file('img_path') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_path');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'post/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $post->img_path = $path;
        }
        $data = array(
            $post->img_path = $path,
            $post->category_id = $request->input('category_id'),
            $post->title = $request->input('title'),
            $post->slug = str_slug($request->input('title'), '-'),
            $post->sub_title = $request->input('sub_title'),
            $post->content = $request->input('content'),
            $post->posted_at = date("Y-m-d H:i:s")
        );
        $post->save($data);
        return redirect()->back()->with('success','News & Advice has been saved');

	}
	// view.backend.pages.post.post.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit News & Advice';
		$data['post'] = Post::findOrFail($id);
		$data['category'] = DB::table('categories')->select('id', 'name')->get();
		return view('backend.pages.post.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required'
        ]);

        $post_old = Post::find($id);
        $post = new Post();
        if ($request->file('img_path') === null) {
            $path = $post->img_path;
        } else {
            $img = $request->file('img_path');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'post/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $post->img_path = $path;
        }

        $data = array(
            $post->img_path = $path,
            $post->category_id = $request->input('category_id'),
            $post->title = $request->input('title'),
            $post->slug = str_slug($request->input('title'), '-'),
            $post->sub_title = $request->input('sub_title'),
            $post->content = $request->input('content'),
            $post->posted_at = date("Y-m-d H:i:s")
        );
        $post->save($data);
        // Delete
        $post_old->delete();
        Storage::disk('public')->delete($post_old->img_path);
        return redirect()->route('post')->with('success','News & Advice has been updated');
	}
    // get action
    public function show($id)
    {
        $data['page_title'] = 'View News & Advice';
        $data['post'] = Post::findOrFail($id);
        return view('backend.pages.post.show', $data);
    }
	// delete action
	public function destroy($id)
	{
        $post = Post::findOrFail($id);
        $post->delete();
        Storage::disk('public')->delete($post->img_head);

        return redirect()->back()->with('success','News & Advice has been deleted');
	}
}
