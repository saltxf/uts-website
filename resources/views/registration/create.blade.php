<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <style>
            .custom-container {
            background-color: #f3f3f3;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .custom-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        .custom-button {
            background-color: #007bff;
            color: #fff;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container custom-container">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">
                        <h3>Pendaftaran Siswa</h3>
                    </span>
                    <div class="float-right">
                        <h2><a href="{{ route('registration.index') }}" class="btn btn-primary btn-sm">Kembali</a></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('registration.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-form">
                            @include('registration.form')
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn custom-button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
