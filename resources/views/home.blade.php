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
    <div class='flex justify-center'>
        @foreach($lists as $list)
        <div class='w-48 text-center shadow-xl rounded-xl m-5 p-3 text-2xl bg-blue-200 hover:scale-110 duration-100'>
            <button name='listId' value=1>
                <img src='img/done.png' class='w-36 mx-auto'>
                {{$list['title']}}
            </button>
            <div class='flex justify-end'>
                <img src='img/edit.png' class='w-7 hover:opacity-40' onclick="alert('Hallo')">
                <img src='img/delete.png' class='w-7 hover:opacity-40'>
            </div>
        </div>
        @endforeach
        <button name='createList' value=1>Create List</button>
    </div>
</form>

@endsection
