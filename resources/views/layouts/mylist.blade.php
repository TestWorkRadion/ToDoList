<table class="border-collapse w-full">

    <thead>
    <tr>
        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ToDO
            name
        </th>
        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
            Created Ad
        </th>
        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
            Status
        </th>
        <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @if(old())
        @include('layouts.inc.flashmessage')
    @endif
    @foreach($myparams as $parametrs)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span
                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ToDO name</span>
                {{$parametrs->title}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
            <span
                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Created Ad</span>
                {{$parametrs->created_at}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
            <span
                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                @if($parametrs->is_done==3)
                    <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">deleted</span>
                @elseif($parametrs->is_done==1)
                    <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">active</span>
                @endif
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
            <span
                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a href="{{route('todolist',$parametrs->id)}}" class="text-blue-400 hover:text-blue-600 underline">Go
                    To</a>
                @if($parametrs->is_done !=3)
                    <a href="{{route('deltask',$parametrs->id)}}"
                       class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                @endif
            </td>
        </tr>
    @endforeach


    </tbody>
</table>

@include('layouts.inc.addlists')






