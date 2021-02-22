


<div class="mt-10 flex justify-center w-max mx-auto p-5 rounded border-2 border-gray-200">
<form action="{{route('mynewlist')}}" method="POST" class="m-4 flex">
    @csrf
    <input type="text" name="newlists" class="rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="New ToDo name">
    <input type="submit" name="submit" class="border-2 border-transparent bg-purple-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-purple-500 hover:bg-transparent hover:text-purple-500" value="Create New ToDo List">
</form>
</div>
