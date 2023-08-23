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
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $banner->name }}">
                              
                            </div>
                         
                            <div class="form-group">
                                <label>Body</label>
                                <textarea type="text" class="form-control ckeditor"  name="body">{{  $banner->body  }}</textarea>
            
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

