@extends('layouts.admin')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('Categories New') }}"><i class="fa fa-plus"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Categories</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td>
                                <form action="{{ route('Categories Delete', ['id'=>$category->_id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn" href="{{ route('Categories Edit', ['id'=>$category->_id]) }}"><i class="fa fa-edit"></i></a>
                                    <button class="btn"><i class="fa fa-trash text-danger"></i></button>                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
            
@endsection
