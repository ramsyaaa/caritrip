@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Gambar Kapal</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Kapal </th><td> {{ $boatimage->boat ? $boatimage->boat->boat_name : "" }} </td></tr><tr><th> Nama Gambar </th><td> {{ $boatimage->image_name }} </td></tr><tr><th> Deskripsi </th><td> {{ $boatimage->image_description }} </td></tr><tr><th> Gambar </th><td>
                                        <img id="image_preview" src="{{ isset($boatimage) && $boatimage->key_visual ? asset( $boatimage->key_visual) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boatimage) ? 'block' : 'none' }};" />
                                    </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat/' . $boat_id . '/images') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
