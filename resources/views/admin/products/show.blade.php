
@extends('layouts.admin')
@section('title')
    Products
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
          
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show table  Id -> {{ $product->id }}</h4>
                            <div class="card-header-form">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                    
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th>Title (UZ)</th> <td>{{ $product->title_uz }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title (EN)</th> <td>{{ $product->title_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title (RU)</th> <td>{{ $product->title_ru }}</td>
                                    </tr>
                                    <tr>
                                        <th>Body (UZ)</th> <td>{{ $product->desc_uz }}</td>
                                    </tr>
                                    <tr>
                                        <th>Body (RU)</th> <td>{{ $product->desc_en }}/td>
                                    </tr>
                                    <tr>
                                        <th>Body (RU)</th> <td>{{ $product->desc_ru }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th> <td>{!! $product->category->name_uz !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Menu</th> <td>{!! $product->menu->name_uz !!}</td>
                                    </tr>
                                   
                                   
                                    <tr>
                                        <th>Image</th> 
                                        <td>
                                            @foreach (explode('|', $product->multi_img) as $image)
                                                <img src="{{ asset('Products/image/' . $image) }}" alt="Product Image" width="50px" height="50px">
                                            @endforeach
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <th>Slug</th> <td>{{ $product->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta title</th> <td>{{ $product->meta_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta description</th> <td>{{ $product->meta_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meta keywords</th> <td>{{ $product->meta_keywords }}</td>
                                    </tr>
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
