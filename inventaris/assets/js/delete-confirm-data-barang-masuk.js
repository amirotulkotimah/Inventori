const btnModals = document.querySelectorAll('button[data-toggle=modal]');
const btnDeleteLink = document.querySelector('a.btn-hapus');

btnModals.forEach(btn => {
    btn.addEventListener('click', function () {
        btnDeleteLink.setAttribute('href', `https://inv.appix.id/barang_masuk_c/hapus_data/${btn.getAttribute('data-id-data-barang-masuk')}`)
    });
});