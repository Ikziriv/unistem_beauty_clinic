<?php

namespace App\Modules\About\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\ {
	Modules\About\About,
    Modules\About\AboutPartner,
	Http\Controllers\Controller
};

class AboutController extends Controller
{
	// view.backend.pages.menu.about.index
	public function index()
	{
		$data['page_title'] = 'About';
		$data['about'] = About::all()->toArray();
        $data['partner'] = AboutPartner::all()->toArray();
		return view('backend.pages.menu.about.index', $data);
	}
	// view.backend.pages.menu.about.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit About';
		$data['about'] = About::findOrFail($id);
		return view('backend.pages.menu.about.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        $about_old = About::find($id);
        $about = new About();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'about/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $about->img_head = $path;
        }

        $data = array(
            $about->img_head = $path,
            $about->title = $request->input('title'),
            $about->content = $request->input('content')
        );
        $about->save($data);
        // Delete
        $about_old->delete();
        Storage::disk('public')->delete($about_old->img_head);
        return redirect()->route('about')->with('success','About has been updated');
	}

    // About Partner
    public function upload_partner()
    {
        $data['page_title'] = 'Upload Partner';
        return view('.backend.pages.menu.about.upload', $data);
    }

    public function upload_store(Request $request)
    {
        $time = Carbon::now();
        $partner = new AboutPartner();
        $image = $request->file('file');
        if($image){
            // $name = time().$image->getClientOriginalname();
            // $image->move('img/bamed/about/partner/', $name);
            // $path = "/img/bamed/about/partner/".$name;
            // $about->images()->create(['img_path' => $path]);

            $filename =  date_format($time, 'Y') . '_' . $image->getClientOriginalName();
            $path = 'about/partner/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image->getRealPath()));
            $partner->create(['img_path' => $path]);

            return response()->json($image, 200);
        }
        else {
            return response()->json('error', 400);
        }
        // return 'Done';
    }

    public function insert_partner(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'link_path' => 'required'
        ]);
        $partner = AboutPartner::find($id);
        $partner->link_path = $request->input('link_path');
        $partner->update();
        return redirect()->back()->with('success','Partner link has been send');
    }

    public function update_partner(Request $request)
    {
        $data = $this->validate(request(), [
            'link_path' => 'required'
        ]);
        $partner = AboutPartner::find($request->input('id'));
        $partner->link_path = $request->input('link_path');
        $partner->update();
        return redirect()->back()->with('success','Partner link has been update');
    }
    // delete action
    public function destroy($id)
    {
        $promo = AboutPartner::findOrFail($id);
        $promo->delete();
        Storage::disk('public')->delete($promo->img_promo);

        return redirect()->back()->with('success','Partner has been deleted');
    }
}
