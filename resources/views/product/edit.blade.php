@extends('app')
@section('content')
    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $er)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Alert!</strong>{{ $er }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('product.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($categories as $category)
                            <option {{ $edit->category_id == $category->id ? 'selected' :'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="foem-label">Price</label>
                    <input type="number" placeholder="Enter product price" class="form-control" name="product_price" value="{{ $edit->product_price }}">
                </div>
                <div class="mb-3">
                    <label for="" class="foem-label">Status</label>
                    <input type="radio" id="is_active_1" value="1" {{ $edit->is_active == 1 ?'checked' : ''}} name="is_active"> Publish
                    <input type="radio" id="is_active_0" value="0" {{ $edit->is_active == 0 ? 'checked' : ''}}name="is_active"> Draft
                </div>
            </div>

            <div class="col-sm-6">

                <div class="mb-3">
                    <label for="" class="foem-label">Name</label>
                    <input type="text" placeholder="Enter your Name" class="form-control" name="product_name" value="{{ $edit->product_name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="foem-label">Description</label>
                    <textarea name="product_description" id="" class="form-control" >{{ $edit->product_description }}</textarea >
                </div>
                <div class="mb-3">
                    <label for="" class="foem-label">Photo</label>
                    <input type="file" name="product_photo" class="form-control"                                                                                                                                                                                                  >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save Change</button>
    </form>
@endsection
