<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            
            <!-- NIK -->
            <div class="mt-4">
                <x-label for="nik" :value="__('NIK')" />

                <x-input id="nik" class="block mt-1 w-full"
                                type="text"
                                name="nik" required />
            </div>
            <!-- no hp -->
            <div class="mt-4">
                <x-label for="no_hp" :value="__('Phone')" />

                <x-input id="no_hp" class="block mt-1 w-full"
                                type="text"
                                name="no_hp" required />
            </div>
            <!-- address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full"
                                type="text"
                                name="address" required />
            </div>

            <div class="mt-3 grid grid-cols-2 gap-6 xl:grid-cols-1 items-center">
                <div>
                    <label class="text-gray-700 ml-1">Photo : </label>
                    <div class='flex items-center justify-center w-full mt-2'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-teal-500 group'>
                            <div class='flex flex-col items-center justify-center pt-7 text-center'>
                                <svg class="w-10 h-10 mt-8 text-teal-500 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='text-sm text-gray-400 group-hover:text-teal-600 pt-1 tracking-wider' id="fileName">Pilih Foto</p>
                            </div>
                        <input type='file' class="hidden" name="ktp_photo" id="ktp_photo" />
                        </label>
                    </div>
                </div>
                <div>
                    <label class="text-gray-700 ml-1">Preview : </label>
                    <div class='flex items-center justify-center w-full mt-2'>
                        <label class='flex flex-col border-4 border-dashed w-full h-auto border-teal-500 group bg-gray-300'>
                                <div class='flex flex-col items-center justify-center py-1'>
                                    <img id="preview" src="{{asset('assets/upload/ktp_photo/default.png')}}" alt="preview" class="object-cover h-32">
                                </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script>
    ktp_photo.onchange = evt => {
        const [file] = ktp_photo.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("ktp_photo").value.split("\\").pop();
        }
    }
</script>
