document.addEventListener('DOMContentLoaded', function () {
    const flashModalEl = document.getElementById('flashModal');
    const userDetailEl = document.getElementById('userDetail');
    const previewDemoEl = document.getElementById('previewDemo');

    if (flashModalEl) {
        var flashModal = new bootstrap.Modal(flashModalEl);
        flashModal.show();
    }

    if (userDetailEl) {
        userDetailEl.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const userImage = button.getAttribute('data-user-image');
            const userName = button.getAttribute('data-user-name');
            const userEmail = button.getAttribute('data-user-email');
            const userPhone = button.getAttribute('data-user-phone');
            const userInstagram = button.getAttribute('data-user-instagram');
            
            document.getElementById('modalUserName').textContent = userName || '-';
            document.getElementById('modalUserEmail').textContent = userEmail || '-';
            document.getElementById('modalUserPhone').textContent = userPhone || '-';
            document.getElementById('modalUserInstagram').textContent = userInstagram || '-';

            // USER IMAGE DATA
            const imgEl = document.getElementById('modalUserImage');
            imgEl.src = userImage ? `/storage/${userImage}` : '/dist/images/profile.webp';
        });
    }

    if (previewDemoEl) {
        previewDemoEl.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            if (!button) return;

            const demoImage = button.getAttribute('data-demo-image');

            // DEMO IMAGE DATA
            const imgEl = document.getElementById('modalDemoImage');
            imgEl.src = demoImage ? `/storage/${demoImage}` : '/dist/images/profile.webp';
        });
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
