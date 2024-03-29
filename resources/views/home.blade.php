@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('main') }}" method='post'>
    @csrf
    <div class='flex justify-center flex-wrap mx-auto w-4/5'>
        @foreach($lists as $list)
            <div class='w-48 text-center shadow-xl rounded-xl mx-3 my-5 p-3 text-2xl bg-blue-200 hover:scale-110 duration-100'>
                <button name='listId' value="{{$list['id']}}">
                    <img src='img/done.png' class='w-36 mx-auto'>
                    {{$list['title']}}
                </button>
                <div class='flex justify-center'>
                    <img src='img/edit.png' class='w-7 hover:opacity-40' onclick="alert('Hallo')">
                    <button name='deleteList' value="{{$list['id']}}" onclick="return confirm('Are you sure?');"><img src='img/delete.png' class='w-7 hover:opacity-40'></button>
                </div>
            </div>
        @endforeach

        <div class='w-48 text-center shadow-xl rounded-xl m-5 p-3 text-2xl bg-blue-200 hover:scale-110 duration-100'>
            <div id='createList'>
                <img src='img/add.png' class='w-36 mx-auto'>
                Create new Tasklist
            </div>
        </div>
        
        @include('createNewListForm');
    </div>

</form>

@endsection
