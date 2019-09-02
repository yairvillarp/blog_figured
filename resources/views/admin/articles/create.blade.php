@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Article
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Articles Store') }}"  enctype="multipart/form-data">
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
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug')}}">
                                <label for="slug">{{ __('slug') }}</label>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="tags" type="tags" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags')}}">
                                <label for="tags">{{ __('tags') }}</label>
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="intro" type="text" class="form-control @error('intro') is-invalid @enderror" name="intro" placeholder="Intro">{{ old('intro')}}</textarea>
                            @error('intro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <textarea id="summernote" name="body">{{ old('body')}}</textarea>
                    </div>   
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
            
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#summernote').summernote({
                placeholder: 'Body',
                tabsize: 2,
                height: 300
            });
        });
        [].forEach.call(document.querySelectorAll('input[type="tags"]'), tagsInput);
    </script>
@endsection