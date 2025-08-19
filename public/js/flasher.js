document.addEventListener('DOMContentLoaded', function () {
    const flashModalEl = document.getElementById('flashModal');
    if (flashModalEl) {
        var flashModal = new bootstrap.Modal(flashModalEl);
        flashModal.show();
    }

    const confirmationModal = document.getElementById('confirmation');
    const deleteForm = document.getElementById('deleteForm');

    if (confirmationModal && deleteForm) {
        confirmationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            // Ambil data dari tombol yang diklik
            const action = button.getAttribute('data-action');

            // Set form action & pesan modal
            deleteForm.action = action;
        });
    }
});
