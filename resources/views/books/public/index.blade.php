<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-emerald-500 pb-2">
            <svg class="h-5 w-5 mr-2 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">Buku Publik</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-4xl px-4 sm:px-0 py-8">
                <div class="mb-8">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-2">
                        @auth
                            Welcome, <span class="text-emerald-600 underline underline-offset-4">{{ Auth::user()->name }}</span>!
                        @else
                            Welcome, <span class="text-emerald-600">Guest</span>!
                        @endauth
                    </h1>
                    <p class="text-gray-700 text-base sm:text-lg mb-4">
                      Koleksi lengkap buku terbaik, dari klasik hingga rilisan terkini.
                    </p>
                    <div class="flex items-center gap-3">
                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm sm:text-base flex items-center">
                            <svg class="h-5 w-5 mr-2 animate-bounce text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            {{ $books->total() }} buku tersedia
                        </span>
                    </div>
                </div>
            </div>

            <!-- Filter Form -->
            <form method="GET" class="mb-8 px-4 sm:px-0">
                <div class="flex flex-wrap items-center gap-4">
                    <input type="text" name="author" value="{{ request('author') }}"
                        placeholder="Cari penulis..."
                        class="pl-4 w-full sm:max-w-md border-gray-300 rounded-lg shadow-sm focus:ring-emerald-600 focus:border-emerald-600" />

                    <input type="date" name="uploaded_at" value="{{ request('uploaded_at') }}"
                        class="pl-4 w-full sm:w-auto border-gray-300 rounded-lg shadow-sm focus:ring-emerald-600 focus:border-emerald-600" />

                    <select name="rating" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm focus:ring-emerald-600 focus:border-emerald-600">
                        <option value="">Semua Rating</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Bintang
                            </option>
                        @endfor
                    </select>

                    <select name="sort_by" class="w-full sm:w-auto border-gray-300 rounded-lg shadow-sm focus:ring-emerald-600 focus:border-emerald-600">
                        <option value="newest" {{ request('sort_by', 'newest') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort_by') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                    </select>

                    <div class="flex space-x-2">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm shadow-sm">
                            Filter
                        </button>
                        <a href="{{ route('books.public.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm shadow-sm">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- Buku -->
            @if($books->isEmpty())
                <div class="bg-white p-8 shadow rounded-lg border text-center mx-4 sm:mx-0">
                    <p class="text-gray-600">Belum ada buku tersedia.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                    @foreach ($books as $book)
                        <div class="bg-white shadow-sm rounded-lg border overflow-hidden hover:shadow-md transition-shadow duration-200 flex flex-col h-full">
                            @if($book->thumbnail)
                                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}" class="h-48 w-full object-cover">
                            @else
                                <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                    <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="p-4 sm:p-6 flex flex-col flex-grow">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-1">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600 mb-3">Penulis: {{ $book->author }}</p>

                                <div class="flex items-center mb-3 text-yellow-400 text-lg">
                                    @php
                                        $stars = floor($book->average_rating ?? 0);
                                        $empty = 5 - $stars;
                                    @endphp
                                    {!! str_repeat('★', $stars) . str_repeat('☆', $empty) !!}
                                    <span class="ml-1 text-sm text-gray-500">({{ number_format($book->average_rating ?? 0, 1) }})</span>
                                </div>

                                <div class="mt-auto text-sm text-gray-500 space-y-2">
                                    <p><strong>Diterbitkan:</strong> {{ $book->created_at->translatedFormat('d M Y') }}</p>
                                    <p><strong>Uploader:</strong> {{ Str::limit($book->user->name, 20) }}</p>

                                    <a href="{{ route('books.public.show', $book) }}"
                                        class="block text-center mt-3 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Pagination -->
            @if($books->hasPages())
                <div class="mt-8 px-4 sm:px-0">
                    {{ $books->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
