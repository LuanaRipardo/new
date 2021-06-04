// filter items on button click
$('.filter-button-group').on('click', 'button', function () {
    const BASE_URL = window.location.origin;
    let filterValue = $(this).attr('data-filter'); // É o  cara que tem que mostrar
    let slider = $('#motorcycles-slider');

    let loading = `<div style="text-align: center">
                        <img src="${BASE_URL + '/images/loading.svg'}" alt="Imagem de carregando">
                    </div>`;
    slider.html(loading);

    axios.get(BASE_URL + '/api/get-motorcycle/' + filterValue)
        .then(function (response) {
            slider.slick('unslick');
            let html = "";
            response.data.forEach(function (val) {
                html += `<div class="col-sm-12 mt-1 grid-item">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="${BASE_URL + '/motos/' + val.slug}">
                                <img src="${BASE_URL + '/' + val.path}" alt="Imagem da moto ${val.name}">
                            </a>
                            <div class="product-content-wrapper">
                                <div class="product-title-spreed">
                                    <h4><a href="${BASE_URL + '/motos/' + val.slug}">${val.name}</a></h4>
                                    <span>${val.rpm} RPM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            });

            slider.html(html);
            slider.slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
        }).catch(function (error) {
        iziToast.error({
            title: 'Oops...',
            titleColor: '#ffffff',
            messageColor: '#ffffff',
            iconColor: '#ffffff',
            timeout: 5000,
            backgroundColor: 'rgb(232,15,15)',
            message: 'Houve um problema ao carregar as motos, aguarde enquanto atualizamos a página.'
        });

        setTimeout(function() {
            window.location.href = window.location.origin;
        }, 5000)
    });
});
