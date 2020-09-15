<?php

namespace App\Http\Controllers;

use App\Evaluator;
use Illuminate\Http\Request;

class EvaluatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluators = Evaluator::all();

        return view('evaluator\index', [
            'evaluators' => $evaluators
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evaluator\create');
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

        Evaluator::create($data);

        return redirect()->route('evaluator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$evaluator = Evaluator::find($id)) {
            return redirect()->back();
        };
        
        return view('evaluator.show', [
            'evaluator' => $evaluator
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
        if (!$evaluator = Evaluator::find($id)) {
            return redirect()->back();
        };

        return view('evaluator\edit', compact('evaluator'));
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
        if (!$evaluator = Evaluator::find($id)) {
            return redirect()->back();
        };

        $evaluator->update($request->all());

        return redirect()->route('evaluator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$evaluator = Evaluator::find($id)) {
            return redirect()->back();
        };

        $evaluator->delete();

        return redirect()->route('evaluator.index');
    }
}
