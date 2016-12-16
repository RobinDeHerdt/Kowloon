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
        $question = Question::find($id);

        $question->question = $request->question;
        $question->answer   = $request->answer;

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

    public function store(Request $request) 
    {
        $question = new Question();

        $question->question     = $request->question;
        $question->answer       = $request->answer;

        $question->save();

        if($request->products)
        {
            $question->products()->attach($request->products);
        }

        Session::flash('question_create_status', 'Question created successfully');

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
