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
                <x-label for="name" :value="__('NPWP Perusahaan')" />

                <x-input id="npwp" class="block mt-1 w-full" type="text" name="npwp" :value="old('npwp')" maxlength="20" required autofocus />
                <span class="text-xs text-gray-500">*npwp perusahaan</span>
            </div>
            <div>
                <x-label for="name" :value="__('Nama Perusahaan')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <span class="text-xs text-gray-500">*nama perusahaan</span>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <span class="text-xs text-gray-500">*email perusahaan</span>
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

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        @section('footer')
        <script>
            // Mendapatkan elemen input NPWP
            var npwpInput = document.getElementById('npwp');
        
            // Menambahkan event listener untuk memantau input
            npwpInput.addEventListener('input', function() {
                // Menghapus semua karakter selain angka dari nilai NPWP
                var rawValue = this.value.replace(/\D/g, '');
        
                // Memformat NPWP menjadi format yang diinginkan (xx.xxx.xxx.x-xxx.xxx)
                var formattedValue = '';
                for (var i = 0; i < rawValue.length; i++) {
                    if (i == 2 || i == 5 || i == 8 || i == 12) {
                        formattedValue += '.'; // Menambah titik setiap setelah 2, 5, 8, dan 12 karakter
                    } else if (i == 11) {
                        formattedValue += '-'; // Menambah tanda strip setelah 11 karakter
                    }
                    formattedValue += rawValue.charAt(i);
                }
        
                // Mengatur nilai input dengan format NPWP yang sudah diformat
                this.value = formattedValue;
            });
        </script>
        @endsection
    </x-auth-card>
</x-guest-layout>
