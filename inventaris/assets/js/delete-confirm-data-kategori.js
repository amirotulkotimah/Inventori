const btnModals = document.querySelectorAll('button[data-toggle=modal]');
const btnDeleteLink = document.querySelector('a.btn-hapus');

btnModals.forEach(btn => {
    btn.addEventListener('click', function () {
        btnDeleteLink.setAttribute('href', `https://inv.appix.id/kategori_c/hapus_data/${btn.getAttribute('data-id-data-kategori')}`)
    });
});