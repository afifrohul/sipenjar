<div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 h-screen md:shadow-xl animated faster">
    <div class="flex flex-col">
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Dashboard</p>
        <a href="{{url('/back-admin/back-dashboard')}}" class="mb-3 @if (Request::segment(2) == 'dashboard') text-teal-600 @endif capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-chart-pie text-xs mr-2"></i>                
            Dashboard
        </a>

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Master Data</p>
        @if (Auth::user()->id == 1)
        <a href="{{url('/back-admin/admin')}}" class="mb-3 @if (Request::segment(2) == 'admin') text-teal-600 @endif capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-user text-xs mr-2"></i>
            &nbsp;Admin
        </a>
        @endif
        <a href="{{url('/back-admin/prisoner')}}" class="mb-3 @if (Request::segment(2) == 'prisoner') text-teal-600 @endif capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-bullseye-pointer text-xs mr-2"></i>
            &nbsp;Tahanan
        </a>

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Pengiriman Barang</p>
        <a href="{{url('/back-admin/pengiriman/riwayat')}}" class="mb-3 @if (Request::segment(3) == 'riwayat') text-teal-600 @endif capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-history text-xs mr-2"></i>
            Riwayat Pengiriman Barang
        </a>
        <a href="{{url('/back-admin/pengiriman/data')}}" class="mb-3 @if (Request::segment(3) == 'data') text-teal-600 @endif capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-list text-xs mr-2"></i>
            Data Pengiriman Barang
        </a>
    </div>
</div>