<?php

namespace App\Http\Controllers;

use App\ExtraQuestionnaireItem;
use Illuminate\Http\Request;

class ExtraQuestionnaireItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ExtraQuestionnaireItem::all();
        
        return view('extraquestionnaireitem\index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extraquestionnaireitem\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        ExtraQuestionnaireItem::create($data);

        return redirect()->route('extraquestion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$item = ExtraQuestionnaireItem::find($id)) {
            return redirect()->back();
        };

        return view('extraquestionnaireitem.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$item = ExtraQuestionnaireItem::find($id)) {
            return redirect()->back();
        };
        
        return view('extraquestionnaireitem\edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$item = ExtraQuestionnaireItem::find($id)) {
            return redirect()->back();
        };

        $item->update($request->all());

        return redirect()->route('extraquestion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$item = ExtraQuestionnaireItem::find($id)) {
            return redirect()->back();
        };

        $item->delete();

        return redirect()->route('extraquestion.index');
    }
}
