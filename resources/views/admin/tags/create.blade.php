@extends('layouts.admin')

@section('title')
    Create
@endsection


@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Add tags</h4>
                        </div>
                        <div class="card-body">
                            {{-- Add Category Name --}}
                            <div class="form-group">
                                <label>Name (Uz)</label>
                                <input type="text" class="form-control" name="name_uz" value="{{ old('name_uz') }}">
                                @error('name_uz')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name (En)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ old('name_en') }}">
                                @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name (RU)</label>
                                <input type="text" class="form-control" name="name_ru" value="{{ old('name_ru') }}">
                                @error('name_ru')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            {{-- Slug --}}
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                            </div>
                            {{-- Meta Title,Description,keywords--}}
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}">
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="{{ old('meta_description') }}">
                            </div>
                            <div class="form-group">
                                <label>Meta keywords</label>
                                <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}">
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