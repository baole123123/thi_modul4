<!-- Các tệp CSS của Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Các tệp JavaScript của Bootstrap (bao gồm jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="{{ route('books.index') }}" method="GET">
    <input type="text" name="keyword" placeholder="Nhập...">
    <button type="submit">Tìm</button><br><br>
</form>
<h4>Trang chủ danh mục sách</h4>
<!-- Product List Table -->
<div class="col">
    <a href="{{ route('books.create') }}" class="btn btn-primary">
        <i class="bx bx-plus"></i> thêm mới
    </a>
</div>
@if (session('success') || session('error'))
    <div class="card-header pt-2 pb-0">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <script>
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 2000); // Thời gian trễ 2 giây (2000ms)
    </script>
@endif

<div class="card">
    <div class="card-body">
        <!-- Table -->
        <div class="card-body">
            <div class="table-responsive text-nowrap ">
                <table class="table table-bordered border-top">
                    <form action="{{ route('books.index') }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tên sách</th>
                                <th>ISBN</th>
                                <th>Tác giả</th>
                                <th>Thể loại</th>
                                <th>Số trang</th>
                                <th>Năm xuất bản</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach( $items as $key => $book )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category }}</td>
                                <td>{{ $book->number }}</td>
                                <td>{{ $book->year }}</td>



                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('books.edit',$book->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>

                    </form>


                    <form method="POST" action="{{route('books.destroy' ,$book->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item"><i class="bx bx-trash me-1" onclick="return confirm('Bạn có muốn xóa ?')"></i> Delete</button>
                    </form>
            </div>
        </div>
        </td>
    </div>
    </tr>
    @endforeach
    </tbody>
    </table>
    </form>

</div>
</div>

<!-- Pagination -->
<div class="card-footer pt-1 pb-1">
    <div class="float-end">
        {{ $items->appends(request()->query())->links() }}
    </div>
</div>

</div>
</div>

