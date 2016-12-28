<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Product;
use Session;

class QuestionController extends Controller
{
    public function index() 
    {
    	$questions = Question::paginate(10);

        return view('admin.questions', [
        	'questions' => $questions
        ]);
    }

    public function show($id)
    {
        $question = Question::find($id);

        return view('admin.question', [
            'question' => $question
        ]);
    }

    public function create()
    {
        $products = Product::all();

        return view('admin.createquestion', [
            'products' => $products
        ]);
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'question_nl'  => 'required',
            'answer_nl'    => 'required',
            'question_fr'  => 'required',
            'answer_fr'    => 'required',
        ]);

        $question = new Question();

        $question->question_nl     = $request->question_nl;
        $question->answer_nl       = $request->answer_nl;
        $question->question_fr     = $request->question_fr;
        $question->answer_fr       = $request->answer_fr;
        $question->save();

        if($request->products)
        {
            $question->products()->attach($request->products);
        }

        Session::flash('question_create_status', 'Question created successfully');

        return redirect()->action('QuestionController@index');
    }

    public function edit($id)
    {
        $question           = Question::find($id);
        $products           = Product::all();

        return view('admin.editquestion', [
            'question' => $question,
            'products'  => $products
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question_nl'  => 'required',
            'answer_nl'    => 'required',
            'question_fr'  => 'required',
            'answer_fr'    => 'required',
        ]);

        $question = Question::find($id);

        $question->question_nl     = $request->question_nl;
        $question->answer_nl       = $request->answer_nl;
        $question->question_fr     = $request->question_fr;
        $question->answer_fr       = $request->answer_fr;

        if($request->products)
        {
            $question->products()->sync($request->products);
        }
        else
        {
            $question->products()->detach();
        }


        $question->save();

        Session::flash('question_update_status', 'Question updated successfully');

        return redirect()->action('QuestionController@index');
    }

    public function destroy($id)
    {
    	$question = Question::find($id);
        $question->products()->detach();
    	$question->delete();

        Session::flash('question_delete_status', 'Question deleted successfully');

    	return back();
    }
}
