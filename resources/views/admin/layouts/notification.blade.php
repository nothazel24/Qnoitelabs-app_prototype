@if (session('messages'))
    <div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-{{ session('type') }}">
                    <h5 class="modal-title text-white">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="my-2">{{ session('messages') }}</p>
                </div>
                <div class="modal-footer">
                    <p style="font-weight: bold; font-style: italic; font-size: 10px;">Qnoite.com - Jasa penyedia
                        website terpercaya</p>
                </div>
            </div>
        </div>
    </div>
@endif
