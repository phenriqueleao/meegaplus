<?php

namespace App\Http\Controllers;

use App\StandardQuestionnaire;
use Illuminate\Http\Request;

class StandardQuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standardquestionnaires = StandardQuestionnaire::all();
        
        return view('standardquestionnaire\index', [
            'standardquestionnaires' => $standardquestionnaires,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('standardquestionnaire\create');
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
            'name'   => 'required',
        ]);
        
        $data = $request->all();

        StandardQuestionnaire::create($data);

        return redirect()->route('standardquestionnaire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$standardquestionnaire = StandardQuestionnaire::find($id)) {
            return redirect()->back();
        };
        
        $standardquestions = StandardQuestionnaire::find($id)->standardquestions;

        return view('standardquestionnaire.show', [
            'standardquestionnaire' => $standardquestionnaire,
            'standardquestions' => $standardquestions
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
        if (!$standardquestionnaire = StandardQuestionnaire::find($id)) {
            return redirect()->back();
        };
        
        return view('standardquestionnaire\edit', compact('standardquestionnaire'));
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
        if (!$item = StandardQuestionnaire::find($id)) {
            return redirect()->back();
        };

        $this->validate($request, [
            'name'   => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('standardquestionnaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$item = StandardQuestionnaire::find($id)) {
            return redirect()->back();
        };

        $item->delete();

        return redirect()->route('standardquestionnaire.index');
    }
}
