<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Daftar Pengguna
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <form method="GET" action="{{ route('users.index') }}" class="flex flex-wrap items-center gap-4">
                            <div class="relative w-full sm:flex-grow sm:max-w-md">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                   
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}" 
                                    placeholder="Cari nama atau email"
                                    class="w-full border border-gray-300 rounded-lg pl-10 pr-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            
                            <div class="relative w-full sm:w-auto">
                                <select name="verified" class="w-full sm:w-48 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">Semua Status</option>
                                    <option value="yes" {{ request('verified') == 'yes' ? 'selected' : '' }}>Terverifikasi</option>
                                    <option value="no" {{ request('verified') == 'no' ? 'selected' : '' }}>Belum Verifikasi</option>
                                </select>
                            </div>
                            
                            <div class="flex space-x-3 w-full sm:w-auto">
                                <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Terapkan
                                </button>
                                <a href="{{ route('users.index') }}" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-indigo-50">
                                <tr>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-indigo-600 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-indigo-600 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-indigo-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-indigo-600 uppercase tracking-wider">
                                        Bergabung
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                    <tr class="hover:bg-indigo-50">
                                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                            </div>
                                        </td>
                                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <div class="text-sm text-gray-900 truncate max-w-xs">{{ $user->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                            @if ($user->hasVerifiedEmail())
                                                <span class="px-2 py-1 text-xs font-medium rounded-lg bg-green-100 text-green-800">
                                                    Terverifikasi
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-medium rounded-lg bg-yellow-100 text-yellow-800">
                                                    Belum Verifikasi
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <div class="text-sm text-gray-500">
                                                    {{ $user->created_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                            @if(request('verified') === 'yes')
                                                Tidak ada pengguna yang sudah terverifikasi
                                            @elseif(request('verified') === 'no')
                                                Tidak ada pengguna yang belum verifikasi
                                            @elseif(request('search'))
                                                Tidak ada pengguna yang cocok dengan pencarian "{{ request('search') }}"
                                            @else
                                                Tidak ada pengguna ditemukan
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($users->hasPages())
                        <div class="mt-8 px-4 sm:px-0">
                            <nav class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-200 pt-6 space-y-4 sm:space-y-0">
                                <div class="text-sm text-gray-600">
                                    Menampilkan <span class="font-medium">{{ $users->firstItem() }}-{{ $users->lastItem() }}</span> dari <span class="font-medium">{{ $users->total() }}</span> pengguna
                                </div>
                                
                                <div class="flex items-center space-x-2 sm:space-x-3">
                                    @if ($users->onFirstPage())
                                        <span class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 bg-gray-100 text-gray-400 cursor-not-allowed">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </span>
                                    @else
                                        <a href="{{ $users->previousPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </a>
                                    @endif

                                    @foreach ($users->getUrlRange(max(1, $users->currentPage() - 1), min($users->lastPage(), $users->currentPage() + 1)) as $page => $url)
                                        @if ($page == $users->currentPage())
                                            <span class="px-2 sm:px-3 py-1 rounded-lg border border-indigo-500 bg-indigo-50 text-indigo-600 font-medium">
                                                {{ $page }}
                                            </span>
                                        @else
                                            <a href="{{ $url }}" class="px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endforeach

                                    @if ($users->hasMorePages())
                                        <a href="{{ $users->nextPageUrl() }}" class="inline-flex items-center px-2 sm:px-3 py-1 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>