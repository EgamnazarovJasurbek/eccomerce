@extends('layouts.admin')

@section('title')
    Create
@endsection


@section('content')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Ads</h4>
                        </div>
                        <div class="card-body">
                           
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                           
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea type="text" class="form-control" name="body"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Image </label>
                                <input type="file" class="form-control" name="image">
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