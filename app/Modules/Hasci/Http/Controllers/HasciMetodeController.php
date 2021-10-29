<?php

namespace App\Modules\Hasci\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Hasci\HasciMetode,
	Http\Controllers\Controller
};

class HasciMetodeController extends Controller
{
	// view.backend.pages.hasci.metode.index
	public function index()
	{
		$data['page_title'] = 'Hasci Metode Page';
		$data['hasci_metode'] = HasciMetode::all()->toArray();
		return view('backend.pages.hasci.metode.index', $data);
	}
	// view.backend.pages.hasci.metode.create
	public function create()
	{
		$data['page_title'] = 'Create Hasci Metode Page';
		return view('backend.pages.hasci.metode.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'kriteria' => 'required'
        ]);

        $hasci_metode = new HasciMetode();
        $data = array(
            $hasci_metode->kriteria = $request->input('kriteria'),
            $hasci_metode->konvensional = $request->input('konvensional'),
            $hasci_metode->stemcell = $request->input('stemcell')
        );
        $hasci_metode->save($data);
        return redirect()->back()->with('success', 'Hasci Metode been saved');

	}
	// view.backend.pages.hasci.metode.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Hasci Metode Page';
		$data['hasci_metode'] = HasciMetode::findOrFail($id);
		return view('backend.pages.hasci.metode.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'kriteria' => 'required'
        ]);

        $hasci_metode = HasciMetode::find($id);

        $data = array(
            $hasci_metode->kriteria = $request->input('kriteria'),
            $hasci_metode->konvensional = $request->input('konvensional'),
            $hasci_metode->stemcell = $request->input('stemcell')
        );
        $hasci_metode->update($data);
        return redirect()->back()->with('success','Hasci Metode has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $hasci_metode = HasciMetode::findOrFail($id);
        $hasci_metode->delete();

        return redirect()->back()->with('success','Hasci Metode has been deleted');
	}
}
