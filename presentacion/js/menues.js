// Agrega las nuevas diapositivas según la selección del menú
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('#carouselExampleDark .carousel-inner');
    const menus = {
        0: [
            { src: 'assets/recursos/menu_comun/clasico_1.jpg', caption: 'Menú n°1',  menuId: 0},
            { src: 'assets/recursos/menu_comun/clasico_2.jpg', caption: 'Menú n°2', menuId: 1 },
            { src: 'assets/recursos/menu_comun/clasico_3.jpg', caption: 'Menú n°3', menuId: 2 }
        ],
        1: [
            { src: 'assets/recursos/menu_comun/celiacos_1.jpg', caption: 'Menú n°1', menuId: 3 },
            { src: 'assets/recursos/menu_comun/celiacos_2.jpg', caption: 'Menú n°2', menuId: 4 },
            { src: 'assets/recursos/menu_comun/celiacos_3.jpg', caption: 'Menú n°3', menuId: 5 }
        ],
        2: [
            { src: 'assets/recursos/menu_comun/baja_en_calorias_1.jpg', caption: 'Menú n°1', menuId: 6 },
            { src: 'assets/recursos/menu_comun/baja_en_calorias_2.jpg', caption: 'Menú n°2', menuId: 7 },
            { src: 'assets/recursos/menu_comun/baja_en_calorias_3.jpg', caption: 'Menú n°3', menuId: 8 }
        ],
        3: [
            { src: 'assets/recursos/menu_comun/vegano_1.jpg', caption: 'Menú n°1', menuId: 9},
            { src: 'assets/recursos/menu_comun/vegano_2.jpg', caption: 'Menú n°2', menuId: 10},
            { src: 'assets/recursos/menu_comun/vegano_3.jpg', caption: 'Menú n°3', menuId: 11}
        ],
        4: [
            { src: 'assets/recursos/menu_comun/vegetariano_1.jpg', caption: 'Menú n°1', menuId: 12},
            { src: 'assets/recursos/menu_comun/vegetariano_2.jpg', caption: 'Menú n°2', menuId: 13},
            { src: 'assets/recursos/menu_comun/vegetariano_3.jpg', caption: 'Menú n°3', menuId: 14}
        ],
        5: [
            { src: 'assets/recursos/menu_comun/mediterraneo_1.jpg', caption: 'Menú n°1', menuId: 15}
        ],
        6: [
            { src: 'assets/recursos/menu_comun/crudivegano_1.jpg', caption: 'Menú n°1', menuId: 16}
        ],
        7: [
            { src: 'assets/recursos/menu_comun/flexivegetariano_1.jpg', caption: 'Menú n°1', menuId: 17}
        ],
        8: [
            { src: 'assets/recursos/menu_comun/pescetariano_1.jpg', caption: 'Menú n°1', menuId: 18}
        ],
        9: [
            { src: 'assets/recursos/menu_comun/apivegetariano_1.jpg', caption: 'Menú n°1', menuId: 19}
        ],
        10: [
            { src: 'assets/recursos/menu_comun/lactovegetariano_1.jpg', caption: 'Menú n°1', menuId: 20}
        ],
        11: [
            { src: 'assets/recursos/menu_comun/ovovegetariano_1.jpg', caption: 'Menú n°1', menuId: 21}
        ],
        12: [
            { src: 'assets/recursos/menu_comun/ovolactovegetariano_1.jpg', caption: 'Menú n°1', menuId: 22}
        ]
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

/*menus[menu.value].forEach(function (menuItem, index) {
    // ... (código)

    //menuItem.id para obtener el identificador único
    const menuId = menuItem.id;

    //esto deberia construir la ruta de la imagen utilizando el id único si queres intentarlo Agustin a mi no me salio
    const imagePath = `ruta_base/${menuId}/otras_rutas/imagen_${index + 1}.jpg`;
    
    // Almacena la ruta de la imagen en el array
    selectedMenuImages.push(menuItem.src);
});
*/