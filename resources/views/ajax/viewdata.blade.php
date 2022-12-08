<!-- @if(session('status'))
<h5 class="alert alert-success">{{ session('status') }}</h5>
@endif -->
<div class="row">
    <div class="col">
        @php
        $i = 1;
        @endphp
        @if(count($certificate_data) < 1)
        <h1>Tidak ada data!</h1>
        @else
        <table class="table table-bordered mt-0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Pembuatan</th>
                <th class="no-wrap text-center">Aksi</th>
            </tr>
            @foreach($certificate_data as $certificates)
            <tr>
                <td class="no-wrap text-center">{{ $i++ }}</td>
                <td>{{ $certificates -> nama_peserta }}</td>
                <td>{{ $certificates -> periode }}</td>
                <td class="no-wrap">
                    <a href="convert-pdf/{{ $certificates -> id }}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    <a href="#" id="editButton" class="btn btn-warning"><i class="fa fa-pencil-square-o"
                            aria-hidden="true" onClick="editCertificate({{ $certificates -> id }})"></i></a>
                    <a href="#" class="btn btn-danger" onClick="destroyData({{ $certificates -> id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>