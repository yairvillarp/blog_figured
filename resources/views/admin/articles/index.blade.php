@extends('layouts.admin')

@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('Articles New') }}"><i class="fa fa-plus"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Articles</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><img src="/images/{{$article->img}}" alt="{{$article->title}}" width="100"></td>
                            <td>{{$article->title}}</td>
                            <td>
                                @if($article->Category)
                                    {{$article->Category->title}}
                                @endif
                            </td>
                            <td>{{$article->created_at}}</td>
                            <td>{{$article->updated_at}}</td>
                            <td>
                                <form action="{{ route('Articles Delete', ['id'=>$article->_id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn" href="{{ route('Articles Edit', ['id'=>$article->_id]) }}"><i class="fa fa-edit"></i></a>
                                    <button class="btn"><i class="fa fa-trash text-danger"></i></button>                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $articles->links() }}
        </div>
    </div>
            
@endsection
