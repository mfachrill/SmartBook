<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center border-b-2 border-indigo-500 pb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h2 class="text-md font-medium text-gray-800">
                Tambah Buku Baru
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                <form method="POST" action="{{ route('books.my.store') }}" enctype="multipart/form-data" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="title" :value="__('Judul Buku')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
                                            value="{{ old('title') }}" required autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="author" :value="__('Penulis')" />
                                <x-text-input id="author" name="author" type="text" class="mt-1 block w-full" 
                                            value="{{ old('author') }}" required />
                                <x-input-error :messages="$errors->get('author')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Deskripsi')" />
                                <textarea id="description" name="description" rows="6"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                <div id="imagePreview" class="{{ old('thumbnail') ? '' : 'hidden' }}">
                                    <img id="previewImage" class="mx-auto h-64 w-auto object-contain rounded" 
                                        src="{{ old('thumbnail') ? '#' : '' }}" alt="Preview cover buku" />
                                </div>
                                <div id="emptyState" class="{{ old('thumbnail') ? 'hidden' : 'flex flex-col items-center justify-center h-64 text-gray-400' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-sm">Preview cover buku akan muncul disini</p>
                                </div>
                            </div>

                            <div>
                                <x-input-label for="thumbnail" :value="__('Cover Buku')" />
                                <div class="mt-2">
                                    <label for="thumbnail" class="cursor-pointer w-full inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        Pilih Cover Buku
                                    </label>
                                    <input id="thumbnail" name="thumbnail" type="file" class="hidden" accept="image/*" />
                                </div>
                                <div class="mt-2 text-center">
                                    <p id="fileName" class="text-sm text-gray-500">{{ old('thumbnail') ? old('thumbnail') : 'Belum ada file dipilih' }}</p>
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maksimal: 2MB</p>
                                </div>
                                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row justify-between pt-6 mt-6 border-t border-gray-200 gap-4 sm:gap-0">
                        <a href="{{ route('books.my.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('previewImage');
            const previewContainer = document.getElementById('imagePreview');
            const emptyState = document.getElementById('emptyState');
            const fileName = document.getElementById('fileName');
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    emptyState.classList.add('hidden');
                }
                
                reader.readAsDataURL(file);
                fileName.textContent = file.name;
            } else {
                previewContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
                fileName.textContent = 'Belum ada file dipilih';
            }
        });
    </script>
</x-app-layout>