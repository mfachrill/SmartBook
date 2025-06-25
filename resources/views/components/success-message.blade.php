@if (session('success'))
    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded border border-green-200">
        {{ session('success') }}
    </div>
@endif
