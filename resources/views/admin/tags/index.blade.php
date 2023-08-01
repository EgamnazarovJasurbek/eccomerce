@extends('layouts.admin')
@section('title')
    tags
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
                            <h3>tags Table</h3>
                            <a href="{{ route('admin.tags.create') }}" class="btn btn-primary ml-auto">Create Menus</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nomi_uz</th>
                                            <th>Nomi_en</th>
                                            <th>Nomi_ru</th>
                                            <th>Slug</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tag->name_uz }}</td>
                                                <td>{{ $tag->name_en }}</td>
                                                <td>{{ $tag->name_ru }}</td>
                                                <td>{{ $tag->slug }}</td>
                                                <td>
                                                    <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    <form style="display: inline"
                                                        action="{{ route('admin.tags.destroy', $tag->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are You Delete?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
