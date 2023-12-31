@extends('layouts.admin')

@section('title')
    Update Banner
@endsection

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Banners</h4>
                        </div>
                        <div class="card-body">
                            
                            {{-- Add Category Name --}}
                           
                            <div class="form-group">
                                <label>Name(Uz)</label>
                                <input type="text" class="form-control" name="name_uz" value="{{ $banner->name_uz }}">
                                @error('name_uz')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name(En)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ $banner->name_en }}">
                                @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name(RU)</label>
                                <input type="text" class="form-control" name="name_ru" value="{{ $banner->name_ru }}">
                                @error('name_ru')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Body (UZ)</label>
                                <textarea type="text" class="form-control ckeditor"  name="body_uz"> {{ $banner->body_uz }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Body (RU)</label>
                                <textarea type="text" class="form-control ckeditor"  name="body_ru">{{  $banner->body_ru  }}</textarea>
            
                            </div>
                            <div class="form-group">
                                <label>Body (EN)</label>
                                <textarea type="text" class="form-control ckeditor"  name="body_en">{{  $banner->body_en  }}</textarea>
            
                            </div>

                            <div class="form-group">
                                <label>Image </label>
                                <input type="file" class="form-control" name="image">
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

