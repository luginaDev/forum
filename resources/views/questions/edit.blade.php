@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card grid-margin grid-margin-xl-0 stretch-card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h2>  {{ __('Edit Questions') }} </h2>
                      <div class="ml-auto">
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-success">Back To All questions</a>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{ route('questions.update', $question->id) }}" method="post">
                    @method('PUT')
                    @include("questions._form", ['buttonText' => "Update Question"])
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
