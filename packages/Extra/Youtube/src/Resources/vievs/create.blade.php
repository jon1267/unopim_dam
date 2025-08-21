<x-admin::layouts>

    <h1 class="text-white mb-3">Add Video</h1>

    <x-admin::form method="POST" action="{{ route('youtube.store') }}">
        @csrf
        <div class="mb-3">
            <label class="text-white mr-2">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="text-white mr-2">Link (YouTube URL):</label>
            <input type="url" name="youtube_url" class="form-control" required>
        </div>
        <button class="btn btn-success">Сохранить</button>
    </x-admin::form>

</x-admin::layouts>