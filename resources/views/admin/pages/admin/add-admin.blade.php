@extends('admin.layouts.app')
@section('content')
<div>
    <div class="card mb-8">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Tambah Admin</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/back-admin/admin/store')}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-gray-700 ml-1">Nama Lengkap : </label>
                    <input type="text" name="name" class="form-input w-full block rounded mt-1 p-3 border-2 @error('name') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Nama Lengkap" value="{{old('name')}}">
                    @error('name')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Email : </label>
                    <input type="email" name="email" class="form-input w-full block rounded mt-1 p-3 border-2 @error('email') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Password : </label>
                    <input type="password" name="password" class="form-input w-full block rounded mt-1 p-3 border-2 @error('password') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-shadow">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection