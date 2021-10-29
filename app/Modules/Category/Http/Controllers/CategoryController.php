<?php

namespace App\Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Category\Category,
	Http\Controllers\Controller
};

class CategoryController extends Controller
{
	// view.backend.pages.post.category.index
	public function index()
	{
		$data['page_title'] = 'Category';
		$data['category'] = Category::all()->toArray();
		return view('backend.pages.post.category.index', $data);
	}
	// view.backend.pages.post.category.create
	public function create()
	{
		$data['page_title'] = 'Create Category';
		return view('backend.pages.post.category.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required'
        ]);

        $category = new Category();
        $data = array(
            $category->name = $request->input('name')
        );
        $category->save($data);
        return redirect()->back()->with('success','Category has been saved');

	}
	// view.backend.pages.post.category.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Category';
		$data['category'] = Category::findOrFail($id);
		return view('backend.pages.post.category.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required'
        ]);

        $category = Category::find($id);

        $data = array(
            $category->name = $request->input('name')
        );
        $category->update($data);
        return redirect()->back()->with('success','Category has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success','Category has been deleted');
	}
}
