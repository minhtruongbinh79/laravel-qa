@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">                        
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Add</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                        @forelse ($questions as $question)
                            @include('question._excerpt')
                        @empty
                            <div class="alert alert-warning">
                                <strong>Sorry!</strong> There are no question.
                            </div>
                        @endforelse
                        {{ $questions->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
