// Agrega las nuevas diapositivas según la selección del menú
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carouselExampleDark .carousel-inner');
    const menus = {
        '0': [
            { src: 'assets/recursos/menu_comun/clasico_1.jpg', caption: 'Menú n°1' },
            { src: 'assets/recursos/menu_comun/clasico_2.jpg', caption: 'Menú n°2' },
            { src: 'assets/recursos/menu_comun/clasico_3.jpg', caption: 'Menú n°3' }
        ],
        '1': [
            { src: 'assets/recursos/menu_comun/celiacos_1.jpg', caption: 'Menú n°1' },
            { src: 'assets/recursos/menu_comun/celiacos_2.jpg', caption: 'Menú n°2' },
            { src: 'assets/recursos/menu_comun/celiacos_3.jpg', caption: 'Menú n°3' }
        ],
        '2': [
            { src: 'assets/recursos/menu_comun/baja_en_calorias_1.jpg', caption: 'Menú n°1' },
            { src: 'assets/recursos/menu_comun/baja_en_calorias_2.jpg', caption: 'Menú n°2' },
            { src: 'assets/recursos/menu_comun/baja_en_calorias_3.jpg', caption: 'Menú n°3' }
        ],
        '3': [
            { src: 'assets/recursos/menu_comun/vegano_1.jpg', caption: 'Menú n°1' },
            { src: 'assets/recursos/menu_comun/vegano_2.jpg', caption: 'Menú n°2' },
            { src: 'assets/recursos/menu_comun/vegano_3.jpg', caption: 'Menú n°3' }
        ],
        '4': [
            { src: 'assets/recursos/menu_comun/vegetariano_1.jpg', caption: 'Menú n°1' },
            { src: 'assets/recursos/menu_comun/vegetariano_2.jpg', caption: 'Menú n°2' },
            { src: 'assets/recursos/menu_comun/vegetariano_3.jpg', caption: 'Menú n°3' }
        ],
        // Agregar mas cuando tengamos las imagenes
    };

    document.querySelectorAll('input[name="TipoDieta"]').forEach(function (menu) {
        menu.addEventListener('change', function () {
            // Limpia las diapositivas actuales
            carousel.innerHTML = '';

            // Agrega las nuevas diapositivas según la selección del menú
            menus[menu.value].forEach(function (menuItem, index) {
                const carouselItem = document.createElement('div');
                carouselItem.classList.add('carousel-item');
                if (index === 0) {
                    carouselItem.classList.add('active');
                }

                const image = document.createElement('img');
                image.src = menuItem.src;
                image.alt = `Menú ${menu.value} - Imagen ${index + 1}`;
                image.classList.add('d-block', 'w-100');

                const carouselCaption = document.createElement('div');
                carouselCaption.classList.add('carousel-caption', 'd-none', 'd-md-block');
                const captionText = document.createElement('h5');
                captionText.textContent = menuItem.caption;
                carouselCaption.appendChild(captionText);

                carouselItem.appendChild(image);
                carouselItem.appendChild(carouselCaption);
                carousel.appendChild(carouselItem);
            });
        });
    });
});
