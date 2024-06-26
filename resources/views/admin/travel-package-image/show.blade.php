@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Gambar Paket Travel</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Gambar </th><td>
                                        <img id="image_preview" src="{{ isset($travel_image) && $travel_image->image ? asset( $travel_image->image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($travel_image) ? 'block' : 'none' }};" />
                                    </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/travel-package/' . $travel_package_id . '/images') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
