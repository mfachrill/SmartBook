<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="hidden lg:block w-1/2 bg-gradient-to-br from-indigo-800 to-gray-800 relative">
            <div class="absolute inset-0 bg-opacity-50 bg-black flex items-center justify-center p-12">
                <div class="text-white max-w-md">
                    <h1 class="text-4xl font-bold mb-4">Konfirmasi Keamanan</h1>
                    <p class="text-lg text-gray-300 mb-8">Untuk melanjutkan, harap konfirmasi kata sandi akun <span class="text-white font-medium">Buku</span><span class="text-yellow-400 font-medium">Kita</span> Anda.</p>
                    <div class="flex space-x-4">
                        <div class="w-12 h-1 bg-yellow-400 mt-3"></div>
                        <div>
                            <blockquote class="italic">"Keamanan adalah prioritas utama dalam petualangan membaca Anda."</blockquote>
                            <p class="text-right text-gray-300 mt-2">- Tim <span class="text-white font-medium">Buku</span><span class="text-yellow-400 font-medium">Kita</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 bg-white flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <div class="flex justify-center mb-8">
                    <div class="flex items-center">
                        <div class="relative">
                            <div class="w-16 h-16 bg-indigo-600 rounded-lg flex items-center justify-center transform rotate-6 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="absolute -bottom-2 -right-2 bg-white rounded-full p-1 shadow-lg">
                                <div class="bg-yellow-400 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-800" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <h1 class="ml-4 text-3xl font-bold text-gray-800">Buku<span class="text-yellow-400">Kita</span></h1>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Konfirmasi Kata Sandi</h2>
                
                <div class="mb-6 text-sm text-gray-600 text-center">
                    {{ __('Ini adalah area aman dari aplikasi. Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="password" :value="__('Kata Sandi')" class="block text-sm font-medium text-gray-700 mb-1" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-text-input id="password" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                                        type="password" name="password" required autocomplete="current-password"
                                        placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition duration-150 ease-in-out">
                            {{ __('Konfirmasi') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>