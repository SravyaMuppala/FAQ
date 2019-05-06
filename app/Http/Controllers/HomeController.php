<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $questions = $user->questions()->paginate(6);
        return view('home')->with('questions', $questions);

    }
    public function viewAllQuestions()
    {
        $questions = Question::all();
        return view('view')->with('questions', $questions);
    }

    public function searchQuestions(Request $request)
    {
        $questions = Question::all()->where('body', $request->name);
        return view('search')->with('questions', $questions);
    }
}
