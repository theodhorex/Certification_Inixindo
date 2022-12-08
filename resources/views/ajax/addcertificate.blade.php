<div class="modal-body">
    <div class="mb-3">
        <label class="form-label">Nama Peserta</label>
        <input type="text" id="nama_peserta" class="form-control" placeholder="Masukan Nama Peserta">
    </div>
    <div class="mb-3">
        <label class="form-label">Materi</label>
        <input type="text" id="materi" class="form-control" placeholder="Masukan Materi">
    </div>
    <div class="mb-3">
        <label class="form-label">Periode</label>
        <div class="row">
            <div class="col-md-6">
                <input type="date" id="dari_kapan" class="form-control" placeholder="Dari">
            </div>
            <div class="col-md-6">
                    <input type="date" id="sampai_kapan" class="form-control" placeholder="Sampai">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" onClick="postCertificate()">Tambah</button>
</div>
