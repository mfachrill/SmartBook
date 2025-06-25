<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white shadow-md rounded-lg border border-gray-100">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-emerald-600">Smart<span class="text-orange-400">Buku</span></h1>
                <p class="text-sm text-gray-600 mt-1">Masuk untuk melanjutkan</p>
            </div>

            <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" class="text-gray-700" />
                    <x-text-input id="email"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        placeholder="email@anda.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700" />
                    <x-text-input id="password"
                        class="mt-1 block w-full border-gray-300 focus:ring-emerald-600 focus:border-emerald-600"
                        type="password" name="password" required autocomplete="current-password"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox"
                            class="mr-2 text-emerald-600 border-gray-300 rounded" name="remember">
                        {{ __('Ingat saya') }}
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-emerald-600 hover:underline">
                            {{ __('Lupa kata sandi?') }}
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md text-sm font-medium transition duration-150">
                        {{ __('Masuk') }}
                    </button>
                </div>
            </form>

            <!-- Register link -->
            <div class="text-center mt-6 text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-emerald-600 hover:underline">Buat akun baru</a>
            </div>
        </div>
    </div>
</x-guest-layout>
