<div id='newList' class='absolute left-0 right-0 mx-auto top-48 w-96 text-center shadow-xl rounded-xl m-5 p-3 text-2xl bg-red-200'>
    <img src='img/close.png' id='closeNewList' class='w-7 h-7 float-right hover:opacity-40'>
    <div class='font-bold underline'>Create new Tasklist</div>
    <input name='newListTitle' size='20' placeholder='List Title' class='my-3'><br>

        @for($i = 0; $i < 9; $i++)
            @if($i == 0 || $i == 3 || $i == 6)
                <div class='flex justify-center items-start'>
            @endif
                <input type='radio' name='pic' value='' class='mt-3 ml-3'><img src='img/done.png' class='w-25 mt-3'>
            @if($i == 2 || $i == 5 || $i == 8)
                </div>
            @endif
        @endfor


    <button name='createList' value="{{$userId}}" class='mx-auto mt-3'><img src='img/add.png' class='w-7 h-7 hover:opacity-40'></button>
</div>