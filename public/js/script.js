
const parallaxElement1 = document.querySelector('.parallax-container');
const parallaxElement2 = document.querySelector('.sushi-parallax');
const rotatingElement = document.querySelector('.rotate')
let lastScrollPosition = 0;

function isElementInViewport(element) {
    const elementRect = element.getBoundingClientRect();
    return (
        elementRect.top <= window.innerHeight &&
        elementRect.bottom >= 0
    );
}

window.addEventListener('scroll', () => {
    const currentScrollPosition = window.scrollY;

    
    if (isElementInViewport(parallaxElement1)) {
        const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
        
        if (scrollDirection === 'down') {
            parallaxElement1.style.transform = `translateY(-${currentScrollPosition * 0.2}px)`;
        } else {
            parallaxElement1.style.transform = `translateY(-${currentScrollPosition * 0.2}px)`;
        }
    } else {
        // Reset transform when not in view
        // parallaxElement1.style.transform = 'translateY(0)';
    }
    
    if (isElementInViewport(parallaxElement2)) {
        const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
        
        if (scrollDirection === 'down') {
            parallaxElement2.style.transform = `translateY(-${currentScrollPosition * 0.15}px)`;
        } else {
            parallaxElement2.style.transform = `translateY(-${currentScrollPosition * 0.15}px)`;
        }
    } else {
        // Reset transform when not in view
        // parallaxElement2.style.transform = 'translateY(0)';
    }

    if (isElementInViewport(rotatingElement)) {
        const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
        
        if (scrollDirection === 'down') {
            rotatingElement.style.transform = `translate(0) rotate(${scrollY * 0.09}deg)`;
        } else {
            rotatingElement.style.transform = `translate(0) rotate(${scrollY * 0.09}deg)`;
        }
    } else {
        // Reset transform when not in view
        // parallaxElement2.style.transform = 'translateY(0)';
    }

    

    lastScrollPosition = currentScrollPosition;
});





// const parallaxElement = document.querySelector('.parallax-container');
// let lastScrollPosition = 0;
// let isInSection1 = false;

// // Mengecek apakah scroll berada di Section 1
// function checkIfInSection1() {
//     const section1 = document.querySelector('.section-1');
//     const section1Rect = section1.getBoundingClientRect();
//     isInSection1 = section1Rect.top <= 0 && section1Rect.bottom >= 0;
// }

// // Mengecek apakah scroll berada di Section 2
// function checkIfInSection2() {
//     const section2 = document.querySelector('.section-2');
//     const section2Rect = section2.getBoundingClientRect();
//     isInSection2 = section2Rect.top <= 0 && section1Rect.bottom >= 0;
// }

// window.addEventListener('scroll', () => {
//     const currentScrollPosition = window.scrollY;
//     const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';

//     checkIfInSection1();

//     if (isInSection1) {
//         if (scrollDirection === 'down') {
//             parallaxElement.style.transform = `translateY(-${currentScrollPosition * 0.5}px)`;
//         } else {
//             parallaxElement.style.transform = `translateY(-${currentScrollPosition * 0.2}px)`;
//         }
//     } else {
//         // Reset transform when not in Section 1
//         parallaxElement.style.transform = 'translateY(0)';
//     }

//     lastScrollPosition = currentScrollPosition;
// });




// // Ambil elemen judul
// const title = document.querySelector('.parallax-container');
// const sushi = document.querySelector('.sushi-parallax');

// let previousScroll = window.scrollY;

// // Tambahkan event listener saat menggulir halaman
// window.addEventListener('scroll', () => {
//     // Hitung perubahan transform berdasarkan arah scroll
//     const currentScroll = window.scrollY;
//     const scrollDirection = currentScroll > previousScroll ? 'down' : 'up';
//     let translateY = 0;

//     if (scrollDirection === 'down') {
//         translateY = -currentScroll * 0.3;
//     } else {
//         translateY = 0;
//     }

//     title.style.transform = `translateY(${translateY}px)`;

//     // Batasi pergerakan elemen parallax
//     if (translateY < -200) { // Gantilah angka ini dengan nilai batasan yang sesuai
//         translateY = -200;
//     }

//     sushi.style.transform = `translateY(${translateY}px)`;

//     previousScroll = currentScroll;
// });

// const section1 = document.querySelector('.section-1'); // Ganti dengan selector section yang sesuai
// const section2 = document.querySelector('.section-2');
// const parallaxElements = document.querySelectorAll('.parallax-element'); // Ganti dengan selector elemen-elemen parallax

// const initialY = window.scrollY; // Posisi scroll awal
// let isParallaxActive = false; // Status efek parallax aktif

// // Fungsi untuk mengaktifkan efek parallax
// function activateParallax() {
//     if (!isParallaxActive) {
//         isParallaxActive = true;
//         parallaxElements.forEach(element => {
//             element.style.transform = 'translateY(0)';
//         });
//     }
// }

// // Event listener saat menggulir halaman
// window.addEventListener('scroll', () => {
//     const section1Rect = section1.getBoundingClientRect();
//     const section2Rect = section2.getBoundingClientRect();
    

//     // Jika bagian atas section 1 telah masuk ke dalam viewport
//     if (section1Rect.top <= window.innerHeight && section1Rect.bottom >= 20) {
//         activateParallax();
//     } else {
//         // Matikan efek parallax jika section 1 keluar dari viewport
//         // if (isParallaxActive) {
//         //     isParallaxActive = false;
//         //     parallaxElements.forEach(element => {
//         //         element.style.transform = 'translateY(0)';
//         //     });
//         // }
//     }
// });

// // Aktifkan efek parallax awal jika halaman sudah di-scroll saat dimuat
// if (window.scrollY > section1.getBoundingClientRect().top) {
//     activateParallax();
// }


// ini codingan untuk AOS
// let sections = document.querySelectorAll('section');

// window.onscroll = () => {
//     sections.forEach(sec => {
//         let top = window.scrollY;
//         let offset = sec.offsetTop - 150;
//         let height = sec.offsetHeight;

//         if (top >= offset && top < offset + height){
//             sec.classList.add('show-animate');
//         }
//         else{
//             sec.classList.remove('show-animate');
//         }
//     })
// }