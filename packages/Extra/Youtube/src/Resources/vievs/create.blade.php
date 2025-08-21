<x-admin::layouts>
@section('content')
    <h1>Добавить видео</h1>

    <form method="POST" action="{{ route('youtube.store') }}">
        @csrf
        <div class="mb-3">
            <label>Название:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ссылка (YouTube URL):</label>
            <input type="url" name="url" class="form-control" required>
        </div>
        <button class="btn btn-success">Сохранить</button>
    </form>
@endsection
</x-admin::layouts>