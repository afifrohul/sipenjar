@extends('admin.layouts.app')
@section('content')
<div>
    <div class="card mb-8">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Edit Tahanan</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/back-admin/prisoner/update/'.$getPrisonerDetails->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div>
                    <label class="text-gray-700 ml-1">Nama Lengkap : </label>
                    <input type="text" name="name" class="form-input w-full block rounded mt-1 p-3 border-2 @error('name') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Nama Lengkap" value="{{old('name', $getPrisonerDetails->name)}}">
                    @error('name')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">No Registrasi : </label>
                    <input type="text" name="no_regis" class="form-input w-full block rounded mt-1 p-3 border-2 @error('no_regis') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="No Registrasi" value="{{old('no_regis', $getPrisonerDetails->no_regis)}}">
                    @error('no_regis')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tanggal Masuk : </label>
                    <input type="text" name="enter_date" class="form-input w-full block rounded mt-1 p-3 border-2 @error('enter_date') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Tanggal Masuk" value="{{old('enter_date', $getPrisonerDetails->enter_date)}}">
                    @error('enter_date')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Kasus : </label>
                    <input type="text" name="case" class="form-input w-full block rounded mt-1 p-3 border-2 @error('case') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="Kasus" value="{{old('case', $getPrisonerDetails->case)}}">
                    @error('case')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Ruangan : </label>
                    <input type="text" name="room" class="form-input w-full block rounded mt-1 p-3 border-2 @error('room') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="room" value="{{old('room', $getPrisonerDetails->room)}}">
                    @error('room')
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
<script>
    prisoner_photo.onchange = evt => {
        const [file] = prisoner_photo.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("prisoner_photo").value.split("\\").pop();
        }
    }
</script>
@endsection