@extends('layouts.root')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $data->judul }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ $data->created_at_date }}:{{ $data->created_at_time }}</div>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ $data->gambar }}" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{{ $data->deskripsi }}</p>
                    </section>
                </article>

                <!-- Comments section-->
                <section class="mb-5">
                    <h3 class="fw-bolder mb-1">Komentar</h3>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <h5>{{$message}}</h5>
                        </div>
                    @endif
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4" method="POST" action="/comment">
                                {{ csrf_field() }}
                                <input name="id" id="id" type="text" value="{{$data->id}}" hidden>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anda*" required>
                                <br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda*" required>
                                <br>
                                <textarea class="form-control" name="komentar" id="komentar" rows="3" placeholder="masukkan komentar maksimal 500 karakter!*" required></textarea>
                                <br>
                                <div class="text-end">
                                    <button class="btn btn-outline-dark" type="submit">Kirim</button>
                                </div>
                            </form>
                            <!-- Comment with nested comments-->
                            @foreach ($comment as $item)
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="ms-3">
                                    <div class="fw-bold fs-4">{{$item->nama}}</div>
                                    <div class="text-muted fst-italic mb-2 fs-6">Posted on {{ $item->created_at_date }}:{{ $item->created_at_time }}</div>
                                    <div class="fs-5">{{$item->komentar}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection