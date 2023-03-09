@extends('layouts.app')
@section('content')

<form action="{{ route('main') }}" method='post'>
    @csrf
<input type='hidden' name='listId' value="{{$listId}}">
<div class='flex justify-center'>
    <div class='w-96 p-3 m-5 bg-blue-400 rounded-xl'> 
        <h1 class='text-2xl text-center font-bold'>Tasklist</h1>
        <div class='hidden'>{{$step = 0}}</div>
        @foreach($data as $dat)
            <div class='hidden'>
                {{$id = $dat['id']}}
                {{$active = $dat['active']}}

                @if($step == 0)
                    {{$step = 1}}
                    {{$color = 'bg-blue-100'}}
                @else
                    {{$step = 0}}
                    {{$color = 'bg-blue-200'}}
                @endif

                @if($active == 0)
                    {{$style = 'opacity-40 line-through'}}
                @else
                    {{$style = null}}
                @endif
            </div>
            <div id="task{{$id}}" class='flex justify-between items-center p-3 {{$color}} {{$style}}'>
                <div id="taskText{{$id}}">{{$dat['task']}}</div>
                <div class='flex'>
                    @if($active == 0)
                        <button name='delete' value="{{$id}}"><img src='img/delete.png' class='w-7 h-7 hover:opacity-40'></button>
                        <button name='undone' value="{{$id}}"><img src='img/close.png' class='w-7 h-7 hover:opacity-40'></button>
                    @else
                        <div id="pick{{$id}}" onclick="pick({{$id}})"><img src='img/edit.png' class='w-7 h-7 hover:opacity-40'></div>
                        <button name='done' value="{{$id}}"><img src='img/done.png' class='w-7 h-7 hover:opacity-40'></button>
                    @endif
                </div>
            </div>
        @endforeach
        <div class='flex justify-between items-center p-3 bg-blue-100 mt-5'>
            <input name='newTask' size='20' placeholder='New Task'>
            <button name='create' value=1><img src='img/create.png' class='w-7 h-7 hover:opacity-40'></button>
        </div>
    </div>
</div>
</form>
@endsection