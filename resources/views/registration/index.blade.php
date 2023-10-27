<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div id="card_title">
                            <h3>INFO PENERIMAAN SISWA BARU</h3>
                            <h5>PERIODE TAHUN AKADEMIK 2022/2023</h5>
                        </div>
                        <div class="float-right">
                            <h2><a href="{{ route('registration.create') }}" class="btn btn-primary btn-sm">Daftar</a></h2>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="registration_datatable">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>B. Indonesia</th>
                                    <th>MTK</th>
                                    <th>IPA</th>
                                    <th>Total</th>
                                    <th width="130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/1f297b51fc.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('#registration_datatable').DataTable({
            order: [[6, 'desc']],
            processing: true,
            serverSide: true,
            ajax: "{{ route('registration.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {data: 'no_pendaftaran', name: 'no_pendaftaran'},
                {data: 'nama', name: 'nama'},
                {data: 'nilai_ind', name: 'nilai_ind'},
                {data: 'nilai_mtk', name: 'nilai_mtk'},
                {data: 'nilai_ipa', name: 'nilai_ipa'},
                {data: 'total', name: 'total'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
            ]
        });
    });
</script>
