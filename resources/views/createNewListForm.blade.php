<div id='newList' class='hidden absolute left-0 right-0 mx-auto top-96 w-80 text-center shadow-xl rounded-xl m-5 p-3 text-2xl bg-red-200'>
    <img src='img/close.png' id='closeNewList' class='w-7 h-7 float-right hover:opacity-40'>
    <div class='font-bold underline'>Create new Tasklist</div>
    <input name='newListTitle' size='20' placeholder='List Title' class='my-3'>
    <button name='createList' value="{{$userId}}" class='mx-auto'><img src='img/add.png' class='w-7 h-7 hover:opacity-40'></button>
</div>