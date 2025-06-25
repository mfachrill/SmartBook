<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Detail Buku
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            <div class="mb-6 px-0 sm:px-0">
                <a href="{{ route('books.public.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Buku
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-4 sm:p-6">
                    <div class="flex flex-col">
                        @if($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}" 
                                 class="w-full h-auto max-h-96 object-contain rounded-lg">
                        @else
                            <div class="w-full h-64 bg-gray-100 flex items-center justify-center rounded-lg text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col space-y-4 px-2 sm:px-0">
                        <div>
                            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">{{ $book->title }}</h1>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">Penulis: {{ $book->author }}</p>
                        </div>

                        <div class="prose max-w-none text-gray-700 text-sm sm:text-base">
                            <p>{{ $book->description }}</p>
                        </div>

                        <div class="space-y-3">
                            <p class="text-xs sm:text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Diunggah pada: {{ $book->created_at->translatedFormat('d F Y') }}
                            </p>
                            <p class="text-xs sm:text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Ditambahkan oleh: {{ $book->user->name }}
                            </p>
                        </div>

                        <div class="flex items-center">
                            <div class="text-yellow-400 mr-2 text-lg sm:text-xl">
                                @php
                                    $fullStars = floor($averageRating ?? 0);
                                    $emptyStars = 5 - $fullStars;
                                @endphp
                                @for($i = 0; $i < $fullStars; $i++)
                                    ★
                                @endfor
                                @for($i = 0; $i < $emptyStars; $i++)
                                    ☆
                                @endfor
                            </div>
                            <span class="text-gray-600 text-xs sm:text-sm">
                                {{ number_format($averageRating ?? 0, 1) }}/5
                                @if($ratingCount > 0)
                                    ({{ $ratingCount }} ulasan)
                                @else
                                    (belum ada rating)
                                @endif
                            </span>
                        </div>

                        @auth
                            @if (Auth::id() !== $book->user_id)
                                <form action="{{ route('books.rate', $book) }}" method="POST" class="pt-4 mt-4 border-t border-gray-200">
                                    @csrf
                                    <div class="space-y-3">
                                        <label for="value" class="block text-sm font-medium text-gray-700">Beri rating:</label>
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                            <select name="value" id="value" class="border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-1.5 w-full sm:w-auto">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <option value="{{ $i }}">{{ $i }} bintang</option>
                                                @endfor
                                            </select>
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded-lg font-medium text-white text-xs hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full sm:w-auto justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                                Kirim Rating
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="pt-4 mt-4 border-t border-gray-200">
                                    <p class="text-sm text-gray-500">Anda tidak bisa memberi rating pada buku Anda sendiri.</p>
                                </div>
                            @endif
                        @else
                            <div class="pt-4 mt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Login untuk memberikan rating.</p>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="border-t border-gray-200 px-4 sm:px-6 py-6 bg-gray-50">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center mb-2 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            Komentar
                        </h3>
                        <span class="text-sm text-gray-500">{{ $book->comments->count() }} komentar</span>
                    </div>

                    @auth
                        <form action="{{ route('comments.store', $book) }}" method="POST" class="mb-6">
                            @csrf
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ Auth::user()->name }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="relative">
                                        <textarea name="content" rows="3" class="block w-full px-4 py-3 text-sm border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Tulis komentar Anda..."></textarea>
                                        <div class="absolute bottom-2 right-2">
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                                </svg>
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-4 bg-white rounded-lg border border-gray-200 mb-6">
                            <p class="text-gray-600 mb-2">Anda harus login untuk meninggalkan komentar</p>
                            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Login disini</a>
                        </div>
                    @endauth

                    <div class="space-y-4">
                        @forelse ($book->comments as $comment)
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&color=7F9CF5&background=EBF4FF" alt="{{ $comment->user->name }}">
                                </div>
                                <div class="flex-1 min-w-0 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-1">
                                        <p class="text-sm font-semibold text-gray-900">{{ $comment->user->name }}</p>
                                        <div class="flex items-center space-x-2 mt-1 sm:mt-0">
                                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                            @can('delete', $comment)
                                                <form action="{{ route('comments.destroy', [$book, $comment]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-500" title="Hapus komentar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-700">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-500">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>