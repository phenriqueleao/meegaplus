<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Evaluator;
use App\ExtraQuestionnaireItem;
use App\StandardQuestionnaire;
use App\StandardQuestionnaireItem;
use App\Student;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::all();
        
        return view('evaluation\index', [
            'evaluations' => $evaluations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluations = Evaluation::all();
        $questionnaire = StandardQuestionnaire::all();
        $evaluator = Evaluator::all();
        
        return view('evaluation\create', [
            'evaluations' => $evaluations,
            'questionnaires' => $questionnaire,
            'evaluators' => $evaluator
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
            'course'   => 'required',
            'class' => 'required',
            'discipline' => 'required',
            'institution' => 'required',
            'game_name' => 'required',
            'date' => 'required'
        ]);

        $data = $request->all();

        Evaluation::create($data);

        return redirect()->route('evaluation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$evaluation = Evaluation::find($id)) {
            return redirect()->back();
        };

        $standardquestions = StandardQuestionnaireItem::all();
        $extraquestions = ExtraQuestionnaireItem::all();
        $students = Student::all();

        return view('evaluation.show', [
            'evaluation' => $evaluation,
            'standardquestions' => $standardquestions,
            'extraquestions' => $extraquestions,
            'students' => $students
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
        if (!$evaluation = Evaluation::find($id)) {
            return redirect()->back();
        };
        
        $questionnaires = StandardQuestionnaire::all();

        return view('evaluation\edit', compact('evaluation'))->with('questionnaires', $questionnaires);
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
        if (!$evaluation = Evaluation::find($id)) {
            return redirect()->back();
        };

        $this->validate($request, [
            'course'   => 'required',
            'class' => 'required',
            'discipline' => 'required',
            'institution' => 'required',
            'game_name' => 'required',
            'date' => 'required'
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$evaluation = Evaluation::find($id)) {
            return redirect()->back();
        };

        $evaluation->delete();

        return redirect()->route('evaluation.index');
    }
}
