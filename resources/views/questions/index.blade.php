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
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask questions</a>
                    </div>
                    </div>

                </div>

                <div class="card-body">
                    @include('layouts._messages')
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
                                <div class="d-flex align-items-center">
                                    <h4 class="mt-0"><a href="{{ $question->url }}" class="text-primary">{{ $question->title }}</a></h4>
                                    <div class="ml-auto ">
                                        @can('update', $question)
                                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan
                                        @can('delete', $question)
                                        <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
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
