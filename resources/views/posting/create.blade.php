@extends('layouts.dashboard')
@section('content')
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">{{isset($data)?'Mengubah':'Membuat'}} Posting</h1>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="{{ isset($data) ? route('posting.update', $data->id) : route('posting.store') }}">
            {!! csrf_field() !!}
            {!! isset($data)? method_field('put'):'' !!}
                <div class="form-floating mb-3">
                    <input class="form-control" id="judul" name="judul" type="text" value="{{ isset($data) ? $data->judul:'' }}" maxlength="100" placeholder="name@example.com" required/>
                    <label for="judul">Judul*</label>
                </div>

                <div class="form-floating mb-3">
                    <Textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" maxlength="500" required>{{ isset($data) ? $data->deskripsi:'' }}</Textarea>
                    <label for="deskripsi">Deskripsi*</label>
                </div>

                <div class="mb-3">
                  <label for="gambar" class="form-label">Masukkan Gambar*</label>
                  <input class="form-control" type="file" id="gambar" name="gambar" accept="image/jpg, image/jpeg, image/png" value="{{ isset($data) ? $data->gambar:'' }}" required>
                </div>

                <div class="mt-4 mb-0">
                    <a href="/posting" class="btn btn-warning">Batal</a>
                    <input type="submit" value="Post" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>
  </main>
@endsection