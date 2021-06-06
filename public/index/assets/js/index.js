$(document).ready(function () {

    $(document.body).on('click', '.description-button', function (res) {

        const id = res.target.dataset.id

        $.ajax({
            url: `/event/${id}`,
            type: 'GET',
            success: function (res) {
                if (res.length !== 2) {
                    const result = JSON.parse(res)
                    mess = $(`
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-md-12 m-auto bd-radius  p-4">
                                <div class="event">
                                    <div class="d-flex flex-row">
                                        <img src="http://localhost/admin/img/${result[0].imgSrc}" width="200" height="150" alt="" srcset="">
                                        <div class="infor-description ml-5">
                                            ${result[0].body}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                    $('.description').empty()
                    $('.description').append(mess)
                }

            }
        });

    });

});