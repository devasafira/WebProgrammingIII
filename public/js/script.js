// Ambil elemen judul
const title = document.querySelector('.parallax-container');
const sushi = document.querySelector('.sushi-parallax');

let previousScroll = window.scrollY;

// Tambahkan event listener saat menggulir halaman
window.addEventListener('scroll', () => {
    // Hitung perubahan transform berdasarkan arah scroll
    const currentScroll = window.scrollY;
    const scrollDirection = currentScroll > previousScroll ? 'down' : 'up';
    let translateY = 0;

    if (scrollDirection === 'down') {
        translateY = -currentScroll * 0.3;
    } else {
        translateY = 0;
    }

    title.style.transform = `translateY(${translateY}px)`;

    // Batasi pergerakan elemen parallax
    if (translateY < -200) { // Gantilah angka ini dengan nilai batasan yang sesuai
        translateY = -200;
    }

    sushi.style.transform = `translateY(${translateY}px)`;

    previousScroll = currentScroll;
});

const section1 = document.querySelector('.section-1'); // Ganti dengan selector section yang sesuai
const section2 = document.querySelector('.section-2');
const parallaxElements = document.querySelectorAll('.parallax-element'); // Ganti dengan selector elemen-elemen parallax

const initialY = window.scrollY; // Posisi scroll awal
let isParallaxActive = false; // Status efek parallax aktif

// Fungsi untuk mengaktifkan efek parallax
function activateParallax() {
    if (!isParallaxActive) {
        isParallaxActive = true;
        parallaxElements.forEach(element => {
            element.style.transform = 'translateY(0)';
        });
    }
}

// Event listener saat menggulir halaman
window.addEventListener('scroll', () => {
    const section1Rect = section1.getBoundingClientRect();
    const section2Rect = section2.getBoundingClientRect();
    

    // Jika bagian atas section 1 telah masuk ke dalam viewport
    if (section1Rect.top <= window.innerHeight && section1Rect.bottom >= 20) {
        activateParallax();
    } else {
        // Matikan efek parallax jika section 1 keluar dari viewport
        // if (isParallaxActive) {
        //     isParallaxActive = false;
        //     parallaxElements.forEach(element => {
        //         element.style.transform = 'translateY(0)';
        //     });
        // }
    }
});

// Aktifkan efek parallax awal jika halaman sudah di-scroll saat dimuat
if (window.scrollY > section1.getBoundingClientRect().top) {
    activateParallax();
}
