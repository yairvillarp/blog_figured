@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Article
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Categories Store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required value="{{ old('title')}}">
                                <label for="title">{{ __('Title') }}</label>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
            
@endsection
@section('scripts')
@endsection