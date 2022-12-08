<div class="modal-body">
    <div class="mb-3">
        <label class="form-label label-nama-peserta">Nama Peserta</label>
        <input type="text" id="nama_peserta" class="form-control" value="{{ $show_update_data -> nama_peserta }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Materi</label>
        <input type="text" id="materi" class="form-control" value="{{ $show_update_data -> materi }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Periode</label>
        <div class="row">
            <div class="col-md-6">
                <input type="date" id="dari_kapan" class="form-control" placeholder="Dari" value="{{ $dari_kapanx }}">
            </div>
            <div class="col-md-6">
                    <input type="date" id="sampai_kapan" class="form-control" placeholder="Sampai" value="{{ $sampai_kapanx }}">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" onClick="certificateUpdate({{ $show_update_data -> id }})">Edit</button>
</div>
