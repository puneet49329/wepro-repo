@extends("layout")
@section('section1')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 offset-6">
                @if (count($data) == 0)
                    <a href="{{ URL::to("apidata") }}" class="btn btn-info">Add Data</a>
                @endif
                @if (isset($_GET['s']))
                    <a href="{{ URL::to('/') }}" class="btn btn-secondary">Reset</a>
                @endif
                <a href="{{ URL::to('/like') }}" class="btn btn-warning">My Favourite</a>
            </div>
            <div class="col-md-4">
                <form action="{{ URL::to("/") }}" method="get">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input class="form-control" name="s" placeholder="Search..." required>
                            <button type="submit" class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h2>Record</h2>
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $k => $val)
                        <tr>
                            <th scope="row">{{ $k + 1 }}</th>
                            <td>{{ $val->title }}</td>
                            <td>{{ $val->category }}</td>
                            <td><a href="{{ $val->link }}" target="_blank">{{ $val->link }}</a></td>
                            <td>
                                <i class="{{ $val->like ? 'fa' : 'far' }} fa-heart like" data-val="{{ $val->id }}"></i>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script>
        $(document).on("click", ".like", function() {
            var curr = $(this);
            var id = curr.attr("data-val");
            if (!id) return false;

            $.ajax({
                url: "{{ URL::to('like') }}",
                type: "post",
                data: {id, "_token": '{{ csrf_token() }}'},
                success: function(data) {
                    if (data == 1) {
                        curr.removeClass('far fa-heart');
                        curr.addClass('fa fa-heart');
                    } else {
                        curr.removeClass('fa fa-heart');
                        curr.addClass('far fa-heart');
                    }
                }
            });
        });

    </script>

@endsection
