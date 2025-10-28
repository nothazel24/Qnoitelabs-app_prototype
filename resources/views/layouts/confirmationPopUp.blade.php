{{-- CONFIRMATION POPUP --}}
<div class="modal fade" id="confirmation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3A7CA5;">
                <div class="d-flex gap-2">
                    <img src="{{ asset('dist/icons/notification.svg') }}" alt="info" width="25" loading="lazy">
                    <h5 class="modal-title text-white">Notifikasi</h5>
                </div>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="{{ asset('dist/icons/question.svg') }}" alt="{{ session('id') }}" width="80" class="py-3" loading="lazy">
                <p class="p-0 m-0 text-center">Anda yakin ingin menghapusnya?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
