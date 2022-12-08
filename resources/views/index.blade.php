<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imported-page"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Certificate List</h1>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary float-end" onClick="addCertificates()">
                    Tambah Certificate
                </button>
            </div>
        </div>
        <div class="row my-0">
            <div class="col my-0">
                <div class="alert alert-success d-none">
                    <h5 class="message-info d-block my-auto"></h5>
                </div>
            </div>
        </div>
        <div id="view-data-page"></div>
    </div>

    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.6.1.js') }}"></script>
    <script>
        var dari_kapan
        $(document).ready(function(){
            viewData();
            
        });
        function viewData(){
            $.get("{{ url('viewdata') }}", {}, function(data, status){
                $("#view-data-page").html(data);
            });
        }

        function addCertificates(){
            $.get("{{ url('addCertificate') }}", {}, function(data, status){
                $("#exampleModalLabel").html('Tambah Data');
                $("#imported-page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function postCertificate(){
            var nama_peserta = $("#nama_peserta").val();
            var materi = $("#materi").val();
            var dari_kapan = $("#dari_kapan").val();
            var sampai_kapan = $("#sampai_kapan").val();

            var [tahun, bulan, tanggal] = dari_kapan.split('-');
            var dari_kapans = [bulan, tanggal, tahun].join('/');
            console.log(dari_kapans)

            var [tahun, bulan, tanggal] = sampai_kapan.split('-');
            var sampai_kapans = [bulan, tanggal, tahun].join('/');
            console.log(sampai_kapans)

            $.ajax({
                type: "GET",
                url: "{{ url('postCertificate') }}",
                data: { nama_peserta: nama_peserta, materi: materi, dari_kapan: dari_kapans, sampai_kapan: sampai_kapans },
                success: function(data){
                    $(".btn-close").click();
                    viewData();
                    timeOutMessages('Berhasil Ditambahkan!');
                }
            });
        }

        function editCertificate(id){
            $.get("{{ url('editdatashow') }}/" + id, {}, function(data, status){
                $("#exampleModalLabel").html('Edit Data')
                $("#imported-page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        function certificateUpdate(id){
            var nama_peserta = $("#nama_peserta").val();
            var materi = $("#materi").val();
            var dari_kapan = $("#dari_kapan").val();
            var sampai_kapan = $("#sampai_kapan").val();

            var [tahun, bulan, tanggal] = dari_kapan.split('-');
            var dari_kapans = [bulan, tanggal, tahun].join('/');

            var [tahun, bulan, tanggal] = sampai_kapan.split('-');
            var sampai_kapans = [bulan, tanggal, tahun].join('/');

            var url = "{{ url('editdatapost') }}/" + id;

            $.ajax({
                type: "GET",
                url: url,
                data: {
                    'nama_peserta' : nama_peserta,
                    'materi' : materi,
                    'dari_kapan' : dari_kapans,
                    'sampai_kapan' : sampai_kapans
                },
                success: function(data){
                    $(".btn-close").click();
                    viewData();
                    timeOutMessages('Berhasil diperbarui!');
                }
            });
        }

        function destroyData(id){
            var nama_peserta = $("#nama_peserta").val();
            var materi = $("#materi").val();
            var dari_kapan = $("#dari_kapan").val();
            var sampai_kapan = $("#sampai_kapan").val();

            if(confirm('Yakin ingin menghapus data ?') == true){
                $.ajax({
                    type: "get",
                    url: "{{ url('deletedata') }}/" + id,
                    data: {
                        'nama_peserta' : nama_peserta,
                        'materi' : materi,
                        'dari_kapan' : dari_kapan,
                        'sampai_kapan' : sampai_kapan
                    },
                    success: function(data){
                        viewData();
                        timeOutMessages('Berhasil dihapus!');
                    }
                });
            }
        }

        function timeOutMessages(message){
            var messages = $(".message-info").html(message);
            $(".alert").removeClass('d-none');
            $(".alert").fadeOut(5500, 'linear');
        }
    </script>
</body>
</html>