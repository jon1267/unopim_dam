<x-admin::layouts>

    <h1 class="text-white">Youtube Videos</h1>

    <a href="{{ route('youtube.create') }}" class="text-white btn btn-primary mb-3">Add Video</a>

    <table class="table table-bordered text-white">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            <th>Date</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->title }}</td>
                <td><a href="{{ $video->youtube_url }}" target="_blank">{{ $video->youtube_url }}</a></td>
                <td>{{ $video->created_at }}</td>
                <td>
                    {{--<form method="POST" action="{{ route('youtube.destroy', $video) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Video?')">Delete</button>
                    </form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $videos->links() }}

</x-admin::layouts>