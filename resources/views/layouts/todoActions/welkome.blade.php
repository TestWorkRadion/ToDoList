@extends('layouts.layout')

@section('content')
@if(Auth::user())
    @include('layouts.mylist')
@else
    <div class="m-10 mx-auto p-16 sm:p-24 lg:p-48 bg-gray-200">

        <!-- Carousel Body -->
        <div class="relative rounded-lg block md:flex items-center bg-gray-100 shadow-xl" style="min-height: 19rem;">
            <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg"
                 style="min-height: 19rem;">
                <img class="absolute inset-0 w-full h-full object-cover object-center"
                     src="https://www.epam-group.ru/content/dam/epam/en/EPAM_office_about_3.jpg/_jcr_content/renditions/original./EPAM_office_about_3.jpg"
                     alt="">
                <div class="absolute inset-0 w-full h-full  opacity-75"></div>

            </div>
            <div class="w-full md:w-3/5 h-full flex items-center bg-gray-100 rounded-lg">
                <div class="p-12 md:pr-24 md:pl-16 md:py-12">
                    <p class="text-gray-600 text-center"><span class="text-gray-900 ">Welcome to the homework page of Borisov Radion.</span>
                    <p class="text-center">Theme: ToDoList</p></p>
                    <a class="flex items-baseline mt-3 text-indigo-600 justify-center hover:text-indigo-900 focus:text-indigo-900"
                       href="{{route('register')}}">
                        <span>You must register</span>
                    </a>
                    <p class="text-gray-600 text-center"><span class="text-gray-900 ">OR<span></p>
                    <a class="flex items-baseline mt-3 text-indigo-600 justify-center hover:text-indigo-900 focus:text-indigo-900" href="{{route('login')}}">
                        <span>Login</span>

                    </a>
                </div>
                <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-100 -ml-12"
                     viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100"/>
                </svg>
            </div>

        </div>


    </div>


@endif
@endsection
