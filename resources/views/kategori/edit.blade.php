@extends('layout.app')
{{-- Customize layout Sections --}}
@section('title', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit Kategori')
{{-- Content body; main page content --}}
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>

        <form method="post" action="{{url('kategori/save', [$data->kategori_id])}}">
            {{method_field('PUT')}}
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" 
                    placeholder="Kode Kategori" value="{{$data->kategori_kode}}">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" 
                    placeholder="Nama Kategori" value="{{$data->kategori_nama}}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
