@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-secondary float-left" href="{{ url('/home/view') }}">
                    <b>View Created Questions</b>
                </a>
                <form role="form" id="search-form" class="search-form" method="get" action="{{ url('/home/search') }}">
                    <div class="row float-lg-right">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter Question Name">
                        </div>
                        &nbsp
                        <div>
                            <button class="btn btn-primary" type="submit" id="search-form">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-success float-right" href="{{ route('questions.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can create a question.

                                @endforelse


                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection