@if (session('messages'))
    <div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-{{ session('type') }}">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('dist/icons/notification.svg') }}" alt="info" width="25">
                        <h5 class="modal-title text-white">Notifikasi</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center">
                    @if (session('id') == 'success-notification')
                        <img src="{{ asset('dist/icons/success.svg') }}" alt="{{ session('id') }}" width="80"
                            class="py-3">
                    @else
                        <img src="{{ asset('dist/icons/failed.svg') }}" alt="{{ session('id') }}" width="80"
                            class="py-3">
                    @endif
                    <p class="my-2 text-center">{{ session('messages') }}</p>
                </div>
                <div class="modal-footer">
                    <p style="font-weight: bold; font-style: italic; font-size: 10px;">Qnoite.com - Jasa penyedia
                        website terpercaya</p>
                </div>
            </div>
        </div>
    </div>
@endif
