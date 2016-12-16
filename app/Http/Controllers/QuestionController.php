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
        $products = Product::paginate(10);

        return view('admin.createquestion', [
            'products' => $products
        ]);
    }

    public function store(Request $request) 
    {
        $question = new Question();

        $question->question     = $request->question;
        $question->answer       = $request->answer;

        if($request->products)
        {
            foreach ($request->products as $key => $product) {
                $question->products()->attach($product);
            }
        }

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
