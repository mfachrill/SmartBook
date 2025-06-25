<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="hidden lg:block w-1/2 bg-gradient-to-br from-indigo-800 to-gray-800 relative">
            <div class="absolute inset-0 bg-opacity-50 bg-black flex items-center justify-center p-12">
                <div class="text-white max-w-md">
                    <h1 class="text-4xl font-bold mb-4">Lupa Kata Sandi?</h1>
                    <p class="text-lg text-gray-300 mb-8">Kami akan membantu Anda mendapatkan akses kembali ke akun <span class="text-white font-medium">Buku</span><span class="text-yellow-400 font-medium">Kita</span>.</p>
                    <div class="flex space-x-4">
                        <div class="w-12 h-1 bg-yellow-400 mt-3"></div>
                        <div>
                            <blockquote class="italic">"Pengetahuan adalah harta yang bisa dibawa kemana saja tanpa memberatkan."</blockquote>
                            <p class="text-right text-gray-300 mt-2">- Pepatah Tiongkok</p>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
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

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Atur Ulang Kata Sandi</h2>
                
                <div class="mb-6 text-sm text-gray-600 text-center">
                    {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang kata sandi.') }}
                </div>

                <x-auth-session-status class="mb-4 p-4 bg-indigo-50 text-indigo-600 rounded-lg" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Alamat Email')" class="block text-sm font-medium text-gray-700 mb-1" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <x-text-input id="email" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600" 
                                        type="email" name="email" :value="old('email')" required autofocus
                                        placeholder="email@anda.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition duration-150 ease-in-out">
                            {{ __('Kirim Link Reset Password') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Kembali ke halaman login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>