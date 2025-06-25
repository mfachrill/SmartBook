<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Buku Saya
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8 px-4 sm:px-0">
                <a href="{{ route('books.my.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white text-xs hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition"
                    Tambah Buku
                </a>
            </div>

            <x-success-message class="mb-6 mx-4 sm:mx-0" />

            @if($books->isEmpty())
                <div class="bg-white p-8 shadow-sm rounded-lg border border-gray-200 text-center mx-4 sm:mx-0">
                    <p class="text-gray-500">Anda belum memiliki buku.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                    @foreach ($books as $book)
                    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200 flex flex-col h-full">
                        @if($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}" 
                                 class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-4 sm:p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-1">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3">Penulis: {{ $book->author }}</p>
                            
                            <div class="flex items-center mb-3 -mx-0.5">
                                <div class="text-yellow-400 text-lg">
                                    @php
                                        $fullStars = floor($book->ratings_avg_value ?? 0);
                                        $emptyStars = 5 - $fullStars;
                                    @endphp
                                    @for($i = 0; $i < $fullStars; $i++)
                                        <span class="">★</span>
                                    @endfor
                                    @for($i = 0; $i < $emptyStars; $i++)
                                        <span class="">☆</span>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 ml-1">
                                    ({{ number_format($book->ratings_avg_value ?? 0, 1) }})
                                </span>
                            </div>
                            
                            <div class="mt-auto space-y-3">
                                <p class="text-xs text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $book->created_at->translatedFormat('d M Y') }}
                                </p>
                                
                                <div class="flex justify-end space-x-3 pt-3 border-t border-gray-100">
                                    <a href="{{ route('books.my.edit', $book) }}" 
                                       class="text-sm text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('books.my.destroy', $book) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Yakin ingin menghapus buku ini?')"
                                                class="text-sm text-yellow-500 hover:text-yellow-600 hover:underline flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($books->hasPages())
                    <div class="mt-8 px-4 sm:px-0">
                        <nav class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-200 pt-6 space-y-4 sm:space-y-0">
                            <div class="text-sm text-gray-600">
                                <span class="font-medium">{{ $books->firstItem() }}-{{ $books->lastItem() }}</span> dari <span class="font-medium">{{ $books->total() }}</span> buku
                            </div>
                            
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                @if ($books->onFirstPage())
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $books->previousPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </a>
                                @endif

                                @foreach ($books->getUrlRange(max(1, $books->currentPage() - 1), min($books->lastPage(), $books->currentPage() + 1)) as $page => $url)
                                    @if ($page == $books->currentPage())
                                        <span class="px-2 sm:px-3 py-1 rounded-lg border border-indigo-500 bg-indigo-50 text-indigo-600 font-medium">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                @if ($books->hasMorePages())
                                    <a href="{{ $books->nextPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </nav>
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>