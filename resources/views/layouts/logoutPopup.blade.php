{{-- LOGOUT POPUP --}}
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3A7CA5;">
                <h5 class="modal-title text-white">Notifikasi</h5>
            </div>
            <div class="modal-body">
                <p class="my-2">Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
