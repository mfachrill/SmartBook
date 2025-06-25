<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg border border-gray-100">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-emerald-600">Smart<span class="text-orange-400">Buku</span></h1>
                <p class="text-sm text-gray-600 mt-1">Daftar untuk bergabung dengan SmartBuku</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nama -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700" />
                    <x-text-input id="name"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="text" name="name" :value="old('name')" required autofocus
                        placeholder="Nama Anda" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" class="text-gray-700" />
                    <x-text-input id="email"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="email" name="email" :value="old('email')" required autocomplete="username"
                        placeholder="email@anda.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700" />
                    <x-text-input id="password"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="password" name="password" required autocomplete="new-password"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-gray-700" />
                    <x-text-input id="password_confirmation"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="password" name="password_confirmation" required autocomplete="new-password"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md text-sm font-medium transition duration-150">
                        {{ __('Daftar') }}
                    </button>
                </div>
            </form>

            <!-- Login link -->
            <div class="text-center mt-6 text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-emerald-600 hover:underline">Masuk ke akun Anda</a>
            </div>
        </div>
    </div>
</x-guest-layout>
