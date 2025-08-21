<x-admin::layouts>
@section('content')
    <h1>Youtube Videos</h1>

    <a href="{{ route('youtube.create') }}" class="btn btn-primary mb-3">Добавить видео</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>URL</th>
            <th>Дата</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->title }}</td>
                <td><a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></td>
                <td>{{ $video->created_at }}</td>
                <td>
                    <form method="POST" action="{{ route('youtube.destroy', $video) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить видео?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $videos->links() }}
@endsection
</x-admin::layouts>