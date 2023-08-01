@extends('layouts.admin')

@section('title')
    Update Category
@endsection
@section('css')
  <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Product Category </label>
                                <select class="form-control form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option @if ($product->category_id == $category->id) selected @endif
                                            value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- menus --}}
                            <div class="form-group">

                                <label>Menus selected </label>
                                <select id="" name="menus[]" class="form-control select2" multiple="">
                                    @foreach ($menus as $menu)
                                        <option  @if(in_array($menu->id, $product->menus->pluck('id')->toArray())) selected @endif value="{{ $menu->id }}">{{ $menu->name_uz }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Add Category Name --}}
                            <div class="form-group">
                                <label>Name(Uz)</label>
                                <input type="text" class="form-control" name="name_uz" value="{{ $product->title_uz }}">
                                @error('title_uz')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name(En)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ $product->title_en }}">
                                @error('title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name(RU)</label>
                                <input type="text" class="form-control" name="name_ru" value="{{ $product->title_ru }}">
                                @error('title_ru')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Add Product DESC --}}
                            <div class="form-group">
                                <label>Desc (Uz)</label>
                                <input type="text" class="form-control" name="desc_uz" value="{{ $product->desc_uz }}">
                                @error('desc_uz')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Desc (En)</label>
                                <input type="text" class="form-control" name="desc_en" value="{{ $product->desc_en }}">
                                @error('desc_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Desc (RU)</label>
                                <input type="text" class="form-control" name="desc_ru" value="{{ $product->desc_ru }}">
                                @error('desc_ru')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Price --}}
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Multi Image --}}
                            <div class="form-group">
                                <label>Multi Img</label>
                                <input type="file" class="form-control" name="multi_img[]" multiple
                                    value="{{ $product->multi_img }}">
                                @error('multi_img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- is_spacial --}}
                            <div class="form-group">
                                <div class="control-label">Muhimmi ?</div>
                                <label class="custom-switch mt-2">
                                  <input type="checkbox" value="1" {{ $product->is_spacial == 1 ? 'checked' : '' }} name="is_spacial" class="custom-switch-input">
                                  <span class="custom-switch-indicator"></span>
                                </label>
                              </div>
                            {{-- Slug --}}
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                            </div>
                            {{-- Meta Title,Description,keywords --}}
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $product->meta_title }}">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" name="meta_description"
                                    value="{{ $product->meta_description }}">
                            </div>
                            <div class="form-group">
                                <label>Meta keywords</label>
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ $product->meta_keywords }}">
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
