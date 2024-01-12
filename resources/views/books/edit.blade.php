<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Chỉnh sửa </span>
    </h4>
    <form action="{{route('books.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">

                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <a href="{{route('books.index')}}" class="btn btn-label-secondary">Trở Về</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>

                </div>
            </div>
            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="row mb-10">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ $item->name }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">ISBN</label>
                                        <input type="text" class="form-control" placeholder="isbn" name="isbn" value="{{ $item->isbn }}">
                                        @error('isbn') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tác giả</label>
                                        <input type="text" class="form-control" placeholder="Tác giả" name="author" value="{{ $item->author }}">
                                        @error('author') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1" for="category">Thể loại</label>
                                        <select class="form-control" name="category">
                                            <option value="">Tất cả</option>
                                            <option value="Viễn tưởng" @if($item->category == 'Viễn tưởng') selected @endif>Viễn tưởng</option>
                                            <option value="Chiến tranh" @if($item->category == 'Chiến tranh') selected @endif>Chiến tranh</option>
                                            <option value="Chính trị – pháp luật" @if($item->category == 'Chính trị – pháp luật') selected @endif>Chính trị – pháp luật</option>
                                            <option value="Khoa học công nghệ" @if($item->category == 'Khoa học công nghệ') selected @endif>Khoa học công nghệ</option>
                                            <option value="Tiểu thuyết" @if($item->category == 'Tiểu thuyết') selected @endif>Tiểu thuyết</option>
                                            <option value="Truyện" @if($item->category == 'Truyện') selected @endif>Truyện</option>
                                            <option value="Trinh thám" @if($item->category == 'Trinh thám') selected @endif>Trinh thám</option>
                                        </select>
                                        @error('category') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Số trang</label>
                                        <input type="text" class="form-control" placeholder="Số trang" name="number" value="{{ $item->number }}">
                                        @error('number') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Nắm xuất bản</label>
                                        <input type="text" class="form-control" placeholder="Năm xuất bản" name="year" value="{{ $item->year }}">
                                        @error('year') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
