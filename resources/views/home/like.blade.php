@extends("layout")
@section('section1')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 offset-10">
                <a href="{{ URL::to('/') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <h2>Likes</h2>
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $k => $val)
                        <tr>
                            <th scope="row">{{ $k + 1 }}</th>
                            <td>{{ $val->apis->title }}</td>
                            <td>{{ $val->apis->category }}</td>
                            <td><a href="{{ $val->apis->link }}" target="_blank">{{ $val->apis->link }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
