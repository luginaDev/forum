@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card grid-margin grid-margin-xl-0 stretch-card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h2>  {{ __('All Questions') }} </h2>
                      <div class="ml-auto">
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-success">Ask questions</a>
                    </div>
                    </div>

                </div>

                <div class="card-body">
                   @foreach ($questions as $question)
                       <div class="media">
                           <div class="d-flex flex-column counters">
                               <div class="vote">
                                    <strong>{{ $question->votes }} </strong>votes
                               </div>
                               <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers }}</strong> answers
                               </div>
                               <div class="view">
                                {{ $question->views }} views
                               </div>
                           </div>
                            <div class="media-body">
                                <h4 class="mt-0"><a href="{{ $question->url }}" class="text-primary">{{ $question->title }}</a></h4>
                                <p class="lead">
                                    Asked By
                                    <a href="{{ $question->user->url }}" class="text-primary">{{ $question->user->name }}</a>
                                    <small class="text-info">{{ $question->created_date }}</small>
                                </p>

                                {{ \Illuminate\Support\Str::limit($question->body, 250 )}}
                               
                            </div>
                       </div>
                       <hr>
                   @endforeach

                    <div class="text-center">
                        {{ $questions->links() }}
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
