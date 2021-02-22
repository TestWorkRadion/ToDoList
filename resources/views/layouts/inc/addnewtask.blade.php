<!-- comment form -->
<div class="flex mx-auto items-center justify-center shadow-lg mt-10 mx-8 mb-4 max-w-lg">
    @if(old('updatee'))
        <form class="w-full  bg-white rounded-lg px-4 pt-2" method="POST" action="{{route('isdoneTask')}}">
            <input type="hidden" name="tskid" value="{{ old('tskid') }}">
            <input type="hidden" name="updt" value="{{ old('updatee') }}">
    @else
        <form class="w-full  bg-white rounded-lg px-4 pt-2" method="POST" action="{{route('mynewtask')}}">
            <input type="hidden" name="myid" value="{{$pageid}}">
    @endif

        @csrf


        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add Task</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea
                    class="bg-gray-100 rounded border border-gray-400 leading-normal  resize-none w-full h-50 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="newmytask" placeholder='Please write your task' required>{{old('uptask')}}</textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto"></div>
                <div class="-mr-1">
                    <input type='submit' name="submit"
                           class="border-2 border-transparent bg-green-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-green-500 hover:bg-transparent hover:text-green-500"
                           value='Add Task'>
                </div>
            </div>
        </div>
    </form>
</div>
