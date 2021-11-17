@extends('layouts.dashboard')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Jumlha Posting</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="large text-white stretched-link">{{$jmlpost}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Jumlah Komentar</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="large text-white stretched-link">{{$jmlkomen}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Komentar
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Judul</th>
                                    <th>Komentar</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komen as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <?php
                                    $posting = DB::table('postings')->where('id', $item->posting)->get('judul');
                                    foreach ($posting as $value) {
                                        echo $value->judul;
                                    }
                                    ?>
                                    </td>
                                    <td>{{ $item->komentar }}</td>
                                    <td>{{ $item->created_at_date }}</td>
                                    <td>{{ $item->created_at_time }}</td>
                                    <td>{{ $item->updated_at_date }}</td>
                                    <td>{{ $item->updated_at_time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
@endsection