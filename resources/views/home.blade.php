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
    <button name='listId' value=1 class='w-80 text-center m-5 p-3 font-bold text-2xl bg-green-600'>List1</button>
    <br>
    <button name='listId' value=2>List2</button>
</div>
</form>

@endsection
