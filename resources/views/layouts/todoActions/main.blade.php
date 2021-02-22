@extends('layouts.layout')
@section('content')
    <style>
        body {
            background: white !important;
        }
    </style>

    @if(old())
        @include('layouts.inc.flashmessage')
    @endif
    <table class="rounded-t-lg m-5 w-5/6 mx-auto text-gray-100 bg-gradient-to-l from-indigo-500 to-indigo-800">
        <tr class="text-left border-b-2 border-indigo-300">
            <th class="px-4 py-3">My Tasks</th>
            <th class="px-4 py-3">Created At</th>
            <th class="px-4 py-3">Updated At</th>
            <th class="px-4 py-3">Actions</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
        @foreach($params as $param)
            @if($param->is_done==1)
            <tr class="border-b border-indigo-400">
                @elseif($param->is_done==2)
                <tr class="border-b border-indigo-400 bg-yellow-500">
                @elseif($param->is_done==3)
                <tr class="border-b border-indigo-400 bg-red-500">
                    @endif
                <td class="px-4 py-3">{{$param->title}}</td>
                <td class="px-4 py-3">{{$param->created_at}}</td>
                @if($param->created_at != $param->updated_at)
                    <td class="px-4 py-3">{{$param->updated_at}}</td>
                @else
                    <td class="px-4 py-3"></td>
                @endif
                    <td class="px-4 py-3">
               @if($param->is_done!=3)
                            <form action="{{route('edittask')}}" method="POST">
                                @csrf
                            <button class="border-2 border-transparent bg-purple-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-purple-500 hover:bg-transparent hover:text-purple-500">Update</button>
                                <input type="hidden" name="isdone" value="{{$param->id}}">
                            </form>
                    </td>
                    @endif
                    <td class="px-4 py-3">
                        @if($param->is_done!=3)
                            <form action="{{route('isdoneTask')}}" method="POST">
                                @csrf
                            <button type="submit" name="submit"   class="border-2 border-transparent bg-red-500 ml-3 py-2 px-4 font-bold uppercase text-white rounded transition-all hover:border-red-500 hover:bg-transparent hover:text-red-500">Is Done</button>
                           <input type="hidden" name="isdone" value="{{$param->id}}">
                            </form>
                    </td>
                    @endif
                   </tr>
        @endforeach

    </table>




    @include('layouts.inc.addnewtask')
    <div class="mb-20"></div>
    <!-- fill for tailwind preview bottom overflow -->

@endsection


