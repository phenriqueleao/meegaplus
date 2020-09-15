<?php

namespace App\Http\Controllers;

use App\StandardQuestionnaire;
use App\StandardQuestionnaireItem;
use Illuminate\Http\Request;

class StandardQuestionnairesItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = StandardQuestionnaireItem::all()->sortBy('number');

        return view('standardquestionnaireitem\index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionnaires = StandardQuestionnaire::all();

        return view('standardquestionnaireitem\create', [
            'questionnaires' => $questionnaires,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number'   => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        //dd($request->all());
        //dd($request->only(['name', 'description']));
        //dd($request->has('name'));
        //dd($request->input('name', 'default')); retorna até se não existe
        //dd($request->except('name')); todos, exceto o declarado
        $data = $request->all();

        //$product = new Product;
        //$product->name = $request->name;
        StandardQuestionnaireItem::create($data);

        return redirect()->route('standardquestion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$item = StandardQuestionnaireItem::find($id)) {
            return redirect()->back();
        };
        
        return view('standardquestionnaireitem.show', [
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
        if (!$item = StandardQuestionnaireItem::find($id)) {
            return redirect()->back();
        };
        
        $questionnaires = StandardQuestionnaire::all();

        return view('standardquestionnaireitem\edit', compact('item'))->with('questionnaires', $questionnaires);
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
        if (!$item = StandardQuestionnaireItem::find($id)) {
            return redirect()->back();
        };

        $this->validate($request, [
            'number'   => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        $item->update($request->all());

        return redirect()->route('standardquestion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$item = StandardQuestionnaireItem::find($id)) {
            return redirect()->back();
        };

        $item->delete();

        return redirect()->route('standardquestion.index');
    }
}