@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card grid-margin grid-margin-xl-0 stretch-card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h1>  {{ $question->title }} </h1>
                      <div class="ml-auto">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-success">Back To All questions</a>
                    </div>
                    </div>
                </div>

                <div class="card-body">
                    {!! $question->body!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
