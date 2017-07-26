$('#gallery').imagesGrid({
    images: [{
            src: '/front/img/certificates/1.jpg'
        },
        {
            src: '/front/img/certificates/2.jpg',
            // alt: 'Nature',
            // title: 'Nature'
        },
        '/front/img/certificates/8.png',
        {
            src: '/front/img/certificates/4.png',
            // caption: 'The long way'
        },
        '/front/img/certificates/10.png',
        '/front/img/certificates/6.jpg',
        '/front/img/certificates/7.jpg',
        '/front/img/certificates/7.jpg',
        '/front/img/certificates/3.png',
        '/front/img/certificates/9.jpg',
        '/front/img/certificates/5.png',
        '/front/img/certificates/11.png',
        '/front/img/certificates/12.png'
    ],
    align: true,
    cells: 6
});

$(".owl-one").owlCarousel({
    center: true,
    items: 6,
    loop: true,
    margin: 10,
    dots: true,
    autoplay: true,
    autoplaySpeed: 800,
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 6,
        }
    }
});