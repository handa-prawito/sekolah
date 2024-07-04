@extends('layouts.backend.app')

@section('title')
    Data Buku
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Data Buku</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Buku <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah</a></h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Judul</th>
                                                <th>Penerbit</th>
                                                <th>Penulis</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($book as $key => $book)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $book->book_code }}</td>
                                                    <td>{{ $book->name }}</td>
                                                    <td>{{ $book->publisher->name }}</td>
                                                    <td>{{ $book->author->name }}</td>
                                                    <td>{{ $book->category->name }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailModal{{ $book->id }}">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
    
                                                <!-- Detail Modal -->
                                                <div class="modal fade" id="detailModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $book->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel{{ $book->id }}">{{ $book->name }} - Detail</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Deskripsi:</strong> {{ $book->description }}</p>
                                                                <p><strong>Tahun Terbit:</strong> {{ $book->publication_year }}</p>
                                                                <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
                                                                <p><strong>Stok:</strong> {{ $book->stock }}</p>
                                                                {{-- <p><strong>Tersedia:</strong> {{ $book->is_available ? 'Ya' : 'Tidak' }}</p> --}}
                                                                <!-- You can add more details here based on your needs -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Detail Modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
</div>
@endsection
