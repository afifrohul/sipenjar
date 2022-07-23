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
                    <label class="text-gray-700 ml-1">NIK: </label>
                    <input type="text" name="nik" class="form-input w-full block rounded mt-1 p-3 border-2 @error('nik') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="NIK" value="{{old('nik', $getPrisonerDetails->nik)}}">
                    @error('nik')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Tanggal Lahir : </label>
                    <input type="text" name="birth_date" class="form-input w-full block rounded mt-1 p-3 border-2 @error('birth_date') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="birth_date" value="{{old('birth_date', $getPrisonerDetails->birth_date)}}">
                    @error('birth_date')
                    <span class="pl-1 text-xs text-red-600 text-bold">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-gray-700 ml-1">Asal : </label>
                    <input type="text" name="country" class="form-input w-full block rounded mt-1 p-3 border-2 @error('country') border-red-500 @enderror focus:outline-none focus:border-teal-500" placeholder="country" value="{{old('country', $getPrisonerDetails->country)}}">
                    @error('country')
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
                <div class="mt-3 grid grid-cols-2 gap-6 xl:grid-cols-1 items-center">
                    <div>
                        <label class="text-gray-700 ml-1">Photo : </label>
                        <div class='flex items-center justify-center w-full mt-2'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-teal-500 group'>
                                <div class='flex flex-col items-center justify-center pt-7 text-center'>
                                    <svg class="w-10 h-10 mt-8 text-teal-500 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p class='text-sm text-gray-400 group-hover:text-teal-600 pt-1 tracking-wider' id="fileName">Pilih Gambar</p>
                                </div>
                            <input type='file' class="hidden" name="photo" id="prisoner_photo" />
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="text-gray-700 ml-1">Preview : </label>
                        <div class='flex items-center justify-center w-full mt-2'>
                            <label class='flex flex-col border-4 border-dashed w-full h-auto border-teal-500 group bg-gray-300'>
                                    <div class='flex flex-col items-center justify-center py-1'>
                                        <img id="preview" src="{{asset('assets/upload/prisoner_photo')}}/{{$getPrisonerDetails->photo}}" alt="preview" class="object-cover h-32">
                                    </div>
                            </label>
                        </div>
                    </div>
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