@if (session('error'))
    <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded border border-red-200">
        {{ session('error') }}
    </div>
@endif
