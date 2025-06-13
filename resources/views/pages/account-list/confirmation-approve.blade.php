<div class="modal fade" id="ConfirmationApprove-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/account-list/approve/{{ $item->id }}" method="post">
      @csrf
      @method('POST')
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Aktif</h4>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="for" value="activate">
          <span>Apakah anda yakin akan mengaktifkan akun ini?</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-outline-success">Ya, aktifkan!</button>
        </div>
      </div>
    </form>
  </div>
</div>