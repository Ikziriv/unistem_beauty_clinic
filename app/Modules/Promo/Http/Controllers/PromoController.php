<?php

namespace App\Modules\Promo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Promo\Promo,
	Http\Controllers\Controller
};

class PromoController extends Controller
{
	// view.backend.pages.menu.promo.index
	public function index(Request $request)
	{
		$data['page_title'] = 'Promo';
		$data['promo'] = Promo::where(function($query) use ($request) {
	        if (($search = $request->get('search_promo'))) {
	          $query->orWhere('promo_date', 'like', '%' . $search . '%');
	          }
        })
        ->orderBy("id", "desc")
        ->simplePaginate(5);
		return view('backend.pages.menu.promo.index', $data);
	}
	// view.backend.pages.menu.promo.upload
	public function create()
	{
		$data['page_title'] = 'Promo Upload';

		return view('backend.pages.menu.promo.upload', $data);
	}
	// view.backend.pages.menu.promo.upload
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'promo_date' => 'required'
        ]);
        $promo = new Promo();
        if ($request->file('img_promo') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_promo');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'promo/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $promo->img_promo = $path;
        }
        $data = array(
            $promo->img_promo = $path,
            $promo->promo_date = $request->input('promo_date')
        );
        $promo->save($data);
        return redirect()->back()->with('success','Promo has been upload!');
	}
	// delete action
	public function destroy($id)
	{
        $promo = Promo::findOrFail($id);
        $promo->delete();
        Storage::disk('public')->delete($promo->img_promo);

        return redirect()->back()->with('success','Promo has been deleted');
	}
}
