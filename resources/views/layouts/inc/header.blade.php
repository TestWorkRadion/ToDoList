<header class="w-full bg-gray-800 p-4 flex justify-between items-center">
    <nav class="flex items-center">
        <img class="w-7 h-7"
             src="https://www.solarwinds.com/-/media/solarwinds/swdcv2/licensed-products/service-desk/integrations/sd-integrations-logo-jira.ashx?rev=701fbaa7f8ac4ae08e0406c8984c43e7&hash=75D4F04DE99B88DE7B2C4193F0616F1F"/>
        <div class="text-white text-xs hidden sm:block ml-2">

            @if(Auth::user())
                <a href="https://github.com/TestWorkRadion/ToDoList/tree/master" class="bg-gray-900 hover:bg-gray-700 p-2 rounded cursor-pointer">GiT repository to my
                    Project</a>
                <a href="{{route('homepage')}}" class="bg-gray-900 hover:bg-gray-700 p-2 rounded cursor-pointer ml-1">Home
                    Page</a>
                <a href="{{route('logout')}}" class="bg-gray-900 hover:bg-gray-700 p-2 rounded cursor-pointer ml-1">LogOut</a>
            @endif

        </div>
    </nav>
    <div class="title-font text-lg font-medium text-gray-900 mb-3">
        @if(Auth::user())
            <h1 class="text-white text-xs hidden sm:block ml-2">{{Auth::user()->name}}</h1>
        @endif
    </div>
</header>
