<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Thêm Mới </span>
    </h4>
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="app-ecommerce">
            <!-- Add Product -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <div class="d-flex flex-column justify-content-center">

                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <a href="{{route('books.index')}}" class="btn btn-label-secondary">Trở Về</a>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
            <div class="row">
                <!-- First column-->
                <div class="col-12 col-lg-12">
                    <!-- Product Information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Tên</label>
                                        <input type="text" class="form-control" placeholder="Tên" name="name" value="{{ old('name') }}">
                                        @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">ISBN</label>
                                        <input type="text" class="form-control" placeholder="isbn" name="isbn" readonly value="{{ old('generatedIsbn') }}">
                                        @error('isbn') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Tác giả</label>
                                        <input type="text" class="form-control" placeholder="Tác giả" name="author" value="{{ old('author') }}">
                                        @error('author') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1" for="status-org">Thể loại</label>
                                        <select class="form-control" name="category">
                                            <option value="">Tất cả</option>
                                            <option value="Viễn tưởng">Viễn tưởng</option>
                                            <option value="Chiến tranh">Chiến tranh</option>
                                            <option value="Chính trị – pháp luật">Chính trị – pháp luật</option>
                                            <option value="Khoa học công nghệ">Khoa học công nghệ</option>
                                            <option value="Tiểu thuyết">Tiểu thuyết</option>
                                            <option value="Truyện">Truyện</option>
                                            <option value="Trinh thám">Trinh thám</option>
                                        </select>
                                        @error('category') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Số lượng trang</label>
                                        <input type="text" class="form-control" placeholder="Số lượng trang" name="number" value="{{ old('number') }}">
                                        @error('number') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-customer-name">Năm xuất bản</label>
                                        <input type="text" class="form-control" placeholder="Năm xuất bản" name="year" value="{{ old('year') }}">
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
