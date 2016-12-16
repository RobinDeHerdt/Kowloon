<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
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

    public function show()
    {
        return view('admin.question');
    }

    public function create()
    {
        return view('admin.createquestion');
    }

    public function store(Request $request) 
    {
        $question = new Question();

        $question->title        = $request->title;
        $question->body         = $request->body;
        $question->product_id   = 1;

        $question->save();

        Session::flash('question_create_status', 'Question created successfully');

        return redirect()->action('QuestionController@index');
    }

    public function destroy($id)
    {
    	$question = Question::find($id);
    	$question->delete();

    	return back();
    }
}
