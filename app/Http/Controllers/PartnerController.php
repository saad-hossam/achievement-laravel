<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;

class PartnerController extends Controller
{
    use SaveFile;

    public function index()
    {
        $partners = Partner::all();
        return view('dashboard.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.partners.create');

    }

    public function store(StorePartnerRequest $request)
    {

          $data=[];
          $data['name']=$request->name;
          $finalImagePathName = $this->SaveImage('images/partners', $request->file('logo'));
          $data['logo']=$finalImagePathName;
          Partner::create($data);
          return redirect()->route('partners.index');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit( $id)
    {
        $partner = Partner::find($id);
        return view('dashboard.partners.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $data = [];
        $data['name'] = $request->name;

        // Check if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Unlink the old logo if it exists
            if ($partner->logo && file_exists(public_path('images/partners/'.$partner->logo))) {
                unlink(public_path('images/partners/'.$partner->logo)); // Delete the old logo
            }

            // Save the new logo and store its path
            $finalImagePathName = $this->SaveImage('images/partners', $request->file('logo'));
            $data['logo'] = $finalImagePathName;
        }

        // Update the partner record
        $partner->update($data);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Request $request)
{
    // Find the partner by ID
    $partner = Partner::find($request->partner_id);
    // Check if the partner exists
    if (!$partner) {
        return redirect()->route('partners.index')->withErrors(['error' => 'Partner not found.']);
    }
    // Unlink the partner logo if it exists
    if ($partner->logo && file_exists(public_path('images/partners/'.$partner->logo))) {
        unlink(public_path('images/partners/'.$partner->logo)); // Delete the logo
    }
    // Delete the partner record
    $partner->delete();
    // Redirect with a success message
    return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
}


}
