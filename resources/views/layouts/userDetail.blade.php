{{-- USER DETAIL POPUP --}}
<div class="modal fade" id="userDetail" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="row g-0 align-items-stretch">
                <div class="col-12 col-lg-5 position-relative">
                    <img id="modalUserImage" src="" alt="seller"
                        class="img-fluid w-100 h-100 object-fit-cover rounded-start">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" 
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="col-12 col-lg-7 p-4 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold mb-3" style="font-size: 22px; color: #3A7CA5;">Tentang Penulis</h1>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/user.svg') }}" alt="user" width="20">
                            <p class="m-0"><strong>Penulis:</strong> <span id="modalUserName"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/mail.svg') }}" alt="user" width="20">
                            <p class="m-0"><strong>Email:</strong> <span id="modalUserEmail"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/phone.svg') }}" alt="user" width="20">
                            <p class="m-0"><strong>Phone:</strong> <span id="modalUserPhone"></span></p>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="{{ asset('dist/icons/instagram.svg') }}" alt="user" width="20">
                            <p class="m-0"><strong>Instagram:</strong> <span id="modalUserInstagram"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
