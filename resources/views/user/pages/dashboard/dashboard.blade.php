@extends('user.layouts.app')
@section('content')
<div>
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-green-700 fad fa-newspaper"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{$getCountPengirimanBarang}} Total Pengiriman Barang</h1>
                        <p>Total Riwayat Pengriman Barang</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-pink-700 fad fa-calendar"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{$getCountPengirimanBarangAcc}} Total Pengiriman Barang Diterima</h1>
                        <p>Total Pengiriman Barang Diterima</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-green-700 fad fa-share-alt"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{$getCountPengirimanBarangDecline}} Total Pengiriman Barang Ditolak</h1>
                        <p>Total Pengiriman Barang Ditolak</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-indigo-700 fad fa-tags"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{$getCountPengirimanBarangPending}} Total Pengiriman Barang Pending</h1>
                        <p>Total Pengiriman Barang Menunggu Persetujuan</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
    </div>
    @foreach ($getSend as $item)
    <div class="alert alert-default alert-close mb-5 mx-auto bg-yellow-100 border-t-4 border-yellow-600 mt-4">
        <div class="flex w-full justify-start items-center">
            <div class="mx-4">
                <div class="inline-flex items-center bg-yellow-600 p-2 text-white text-sm rounded-full flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-exclamation-lg w-5 h-5" viewBox="0 0 16 16">
                        <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                    </svg>
                </div>
            </div>
            <div class="mx-4">
                <h1 class="font-bold leading-5 font-medium capitalize  text-gray-700    ">
                    Jangan lupa untuk pergi ke lokasi pengiriman barang dengan rincian sebagai berikut :
                </h1>
                <p class="text-gray-600">Tanggal :</p>
                <p class="text-gray-600">{{ $item->date }}</p>
                <p class="text-gray-600">Sesi :</p>
                @if ($item->session == 1)
                <p class="text-gray-600">09.00 - 10.00</p>
                @elseif($item->session == 2)
                <p class="text-gray-600">10.00 - 11.00</p>
                @endif
                <p class="text-gray-600">Tipe Barang :</p>
                <p class="text-gray-600">{{ $item->type }}</p>
            </div>
        </div>
    </div>
        @endforeach
</div>
@endsection