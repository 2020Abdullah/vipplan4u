<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Package::where('status', 'active')->get();
        return view('admin.packages.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Package::create([
            'card_name' => $request->card_name,
            'card_type' => $request->card_type,
            'card_min' => $request->card_min,
            'card_mix' => $request->card_mix,
            'card_Rate' => $request->card_Rate,
            'card_expire' => $request->card_expire,
            'card_earn_date' => $request->card_earn_date,
            'card_earn_num' => $request->card_earn_num,
        ]);

        return redirect()->route('package.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card_id = $id;
        $card = Package::where('id', $card_id)->first();
        return view('admin.packages.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $card = Package::where('id', $request->card_id);
        $card->update([
            'card_name' => $request->card_name,
            'card_type' => $request->card_type,
            'card_min' => $request->card_min,
            'card_mix' => $request->card_mix,
            'card_expire' => $request->card_expire,
            'card_earn_date' => $request->card_earn_date,
            'card_earn_num' => $request->card_earn_num,
        ]);
        return redirect()->route('package.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Package::where('id', $id);
        $card->update([
            'status' => 'inactive',
        ]);
        return back();
    }
}
