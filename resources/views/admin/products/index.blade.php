@extends('layouts.admin')
@section('title')
    Products
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            @if(session('success')) 
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{ session('success') }}
                </div>
              </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Product Table</h3>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary ml-auto">Create Product</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>Category_id</th>
                                            <th>Nomi_uz</th>
                                            <th>Desc_uz</th>
                                            <th>Price</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        {{-- @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name_uz }}</td>
                                                <td>{{ $category->name_en }}</td>
                                                <td>{{ $category->name_ru }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <form style="display: inline"
                                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Delete?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- Pagination --}}
    
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    {{-- {{ $categories->links() }} --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
