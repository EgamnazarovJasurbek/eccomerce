@extends('layouts.admin')

@section('title')
    Create
@endsection
@section('css')
  <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Product</h4>
                            </div>
                            <div class="card-body">
                                {{-- Category Id --}}
                                <div class="form-group">
                                    <label>Product Category </label>
                                    <select class="form-control form-select" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- menus --}}
                                <div class="form-group">

                                    <label>Tags selected </label>
                                    <select id="" name="tags[]" class="form-control select2" multiple="">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name_uz }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Category Id</label>
                                    <input type="text" class="form-control" name="category_id" value="{{ old('category_id') }}">
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- Add Product Name --}}
                                <div class="form-group">
                                    <label>Name (Uz)</label>
                                    <input type="text" class="form-control" name="title_uz"
                                        value="{{ old('title_uz') }}">
                                    @error('title_uz')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (En)</label>
                                    <input type="text" class="form-control" name="title_en"
                                        value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name (RU)</label>
                                    <input type="text" class="form-control" name="title_ru"
                                        value="{{ old('title_ru') }}">
                                    @error('title_ru')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Add Product DESC --}}
                                <div class="form-group">
                                    <label>Desc (Uz)</label>
                                    <input type="text" class="form-control" name="desc_uz" value="{{ old('desc_uz') }}">
                                    @error('desc_uz')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Desc (En)</label>
                                    <input type="text" class="form-control" name="desc_en" value="{{ old('desc_en') }}">
                                    @error('desc_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Desc (RU)</label>
                                    <input type="text" class="form-control" name="desc_ru" value="{{ old('desc_ru') }}">
                                    @error('desc_ru')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Price --}}
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Multi Image --}}
                                <div class="form-group">
                                    <label>Multi Img</label>
                                    <input type="file" class="form-control" name="multi_img[]" multiple
                                        value="{{ old('multi_img') }}">
                                    @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- is_spacial --}}
                                <div class="form-group">
                                    <div class="control-label">Muhimmi ?</div>
                                    <label class="custom-switch mt-2">
                                      <input type="checkbox" value="1" name="is_spacial" class="custom-switch-input">
                                      <span class="custom-switch-indicator"></span>
                                    </label>
                                  </div>
                                {{-- Slug --}}
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                                </div>
                                {{-- Meta Title,Description,keywords --}}
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title') }}">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        value="{{ old('meta_description') }}">
                                </div>
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        value="{{ old('meta_keywords') }}">
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
