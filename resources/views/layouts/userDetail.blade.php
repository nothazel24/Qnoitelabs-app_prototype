{{-- USER DETAIL POPUP --}}
<div class="modal fade" id="userDetail" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <img id="modalUserImage" src="" alt="seller" class="img-fluid m-0 p-0 rounded-start"
                        style="height: 100%; width: 100%px;">
                </div>

                <div class="col-lg-7 py-3 py-md-0">
                    <h1 class="py-2 m-0 fw-bold px-4 px-md-0" style="font-size: 22px; color: #3A7CA5;">Tentang penulis</h1>
                    <div class="pb-1 px-4 px-md-0">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/user.svg') }}" alt="user" width="20">
                            <p class="py-1 m-0"><strong>Penulis:</strong> <span id="modalUserName"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/mail.svg') }}" alt="user" width="20">
                            <p class="py-1 m-0"><strong>Email:</strong> <span id="modalUserEmail"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/phone.svg') }}" alt="user" width="20">
                            <p class="py-1 m-0"><strong>Phone:</strong> <span id="modalUserPhone"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/instagram.svg') }}" alt="user" width="20">
                            <p class="py-1 m-0"><strong>Instagram:</strong> <span id="modalUserInstagram"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
