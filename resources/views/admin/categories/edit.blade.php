@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Category
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Categories Update', ['id'=>$category->_id]) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required value="{{$category->title}}">
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
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
            
@endsection
@section('scripts')
@endsection