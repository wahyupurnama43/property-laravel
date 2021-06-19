@extends('layouts/admin')
@section('title') Admin | Property Bali @endsection
@section('content')
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">List of Product</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product.create') }}" class="btn btn-primary mb-3"> + Create product</a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Gambar</th>
                                            <th>Product</th>
                                            <th>Categori</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('add-script')
    <script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serveSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'photo',
                name: 'photo'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'categori.name',
                name: 'categori.name'
            },
            {
                data: 'user.name',
                name: 'user.name',
            },
            {
                data: 'price',
                name: 'price',
                render: $.fn.dataTable.render.number(  ',', '.', 3, 'Rp '  )
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searcable: false,
                width: '15%'
            },
        ]
    });

</script>
@endsection