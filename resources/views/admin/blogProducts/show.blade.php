
@extends('layouts.admin')
@section('title')
    Blog Show
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
          
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show table  Id -> {{ $blogProduct->id }}</h4>
                            <div class="card-header-form">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                    
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th>Name (UZ)</th> <td>{{ $blogProduct->name_uz }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (EN)</th> <td>{{ $blogProduct->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (RU)</th> <td>{{ $blogProduct->name_ru }}</td>
                                    </tr>
                                    <tr>
                                        <th>Body (UZ)</th> <td>{{ $blogProduct->body_uz }}</td>
                                    </tr>
                                    <tr>
                                        <th>Body (RU)</th> <td>{{ $blogProduct->body_ru }}/td>
                                    </tr>
                                    <tr>
                                        <th>Body (EN)</th> <td>{{ $blogProduct->body_en }}</td>
                                    </tr>
                                    <td>
                                                    
                                        <img alt="image" src="/images/{{ $blogProduct->image }}" width="100">

                                     </td>
                                     <tr>
                                        <th>Slug</th> <td>{{ $blogProduct->slug }}</td>
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
