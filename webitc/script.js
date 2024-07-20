// Dapatkan referensi elemen tombol hamburger dan menu navigasi
const menuBtn = document.getElementById('menu-btn');
const menu = document.getElementById('menu');

// Tambahkan event listener untuk mengubah status aktif pada tombol hamburger saat diklik
menuBtn.addEventListener('click', () => {
  menuBtn.classList.toggle('active');
});
