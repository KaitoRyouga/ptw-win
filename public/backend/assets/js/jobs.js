$(document).ready(function () {

    $(document.body).on('click', '.openmodal', function () {

        $.ajax({
            url: '/get-session',
            type: 'GET',
            success: function (res) {
                console.log(res)
                if (res.length !== 2) {

                } else {
                    window.location = '/login';
                }
            }
        })

    });

    $(document.body).on('click', '.contact', function (res) {

        const newUser = res.target.dataset.id;

        $.ajax({
            url: '/get-info',
            type: 'POST',
            data: {
                user: newUser
            },
            success: function (res) {

                console.log(res)

                if (res.length !== 2) {

                    const result = JSON.parse(res);

                    const toUser = result[0].username;

                    nameC = $(`
                            <p class="roomTitle" id="titleFirst">${toUser}</p>
                        `);

                    $('.nameC').empty()
                    $('.nameC').append(nameC)

                    $.ajax({
                        url: '/send-touser',
                        type: 'POST',
                        data: {
                            toUser: newUser
                        }, success: function () {

                        }
                    });

                    $.ajax({
                        url: '/add-user-chat',
                        type: 'POST',
                        data: {
                            newUser: newUser
                        }, success: function (res) {
                            if (res.length !== 2) {
                                $('.user-taskbar').empty();
                                const result = JSON.parse(res);

                                console.log(result)

                                for (const [key, value] of Object.entries(result)) {
                                    mess = $(`
                                        <li class="user-item" data-id="${key}"><img src="http://localhost/chat/images/1.jpg" alt="" srcset="">
                                            <div class="chat">
                                                <p class="name">${key}</p>
                                                <p class="chat-last">${value}</p>
                                            </div>
                                        </li>
                                    `)

                                    $('.user-taskbar').append(mess)
                                }

                            }
                        }
                    });
                }
            }
        })

        setTimeout(function () {
            window.location.href = "/messages";
        }, 500);

    });

    $(document.body).on('click', '.edit-info', function () {

        $.ajax({
            url: '/get-info',
            type: 'GET',
            success: function (res) {

                if (res.length !== 2) {
                    const result = JSON.parse(res);

                    //avatar
                    $('.avatar').empty()
                    messAvatar = $(`
                    <input type="file" id="productAvatar" name="imgupload">
                    `);
                    $('.avatar').append(messAvatar)

                    //action
                    $('.action-edit').empty()
                    mess = $(`
                    <button class="btn btn-success mb-3 close-info">Close</button>
                    <button class="btn btn-success mb-3 save-info">Save</button>
                    `);
                    $('.action-edit').append(mess)

                    // contact
                    $('.contact_info').empty()
                    messContact = $(`
                        <input type="text" name="contact" value="${result[0].email}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    `);
                    $('.contact_info').append(messContact)

                    // experience
                    $('.experience').empty()
                    messExperience = $(`
                        <input type="text" name="experience" value="${result[0].experience}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    `);
                    $('.experience').append(messExperience)

                    // summary
                    $('.summary').empty()
                    messSummary = $(`
                        <input type="text" name="summary" value="${result[0].summary}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    `);
                    $('.summary').append(messSummary)

                    // education
                    $('.education').empty()
                    messEducation = $(`
                    <select name="education" class="custom-select">
                    <option selected>---chọn----</option>
                    <option value="none">none</option>
                    <option value="college">college</option>
                    <option value="university">university</option>
                  </select>
                        
                    `);
                    // <input type="text"  value="${result[0].education}" id="" class="form-control" placeholder="" aria-describedby="helpId"></input>
                    $('.education').append(messEducation)

                    // work
                    $('.work').empty()
                    messWork = $(`
                    <select name="work" class="custom-select">
                    <option selected>---chọn----</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                    
                    `);
                    // <input type="text" name="work" value="${result[0].work}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    $('.work').append(messWork)
                }
            }
        })

    });

    $(document.body).on('click', '.close-info', function () {

        console.log("close")
        window.location = "/info";

    });

    $(document.body).on('click', '.save-info', function () {

        var fd = new FormData();
        var files = $('#formAvatar')[0].firstElementChild.firstChild.files;
        fd.append('file', files[0]);

        const contact = $("input[name='contact']").val()
        const experience = $("input[name='experience']").val()
        const summary = $("input[name='summary']").val()
        const education = $("select[name='education']").val()
        const work = $("select[name='work']").val()

        fd.append('contact', contact);
        fd.append('experience', experience);
        fd.append('summary', summary);
        fd.append('education', education);
        fd.append('work', work);

        $.ajax({
            url: '/edit-info',
            type: 'POST',
            contentType: false,
            processData: false,
            data: fd,
            success: function (res) {
                window.location = "/info";
                // console.log(res)
            }
        })

    });

    $(document.body).on('change', '#quantityNumber', function (res) {

        const postId = res.target.dataset.id;
        const quantity = $('.quantityNumber-' + postId).val();

        $.ajax({
            url: '/cart/' + postId,
            type: 'GET',
            success: function (res) {
                const result = JSON.parse(res);
                const total = result[0].price * quantity

                $('.subtotal-' + postId).empty()
                $('.subtotal-' + postId).append((total / 1).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VND')

            }
        })

        $.ajax({
            url: '/cart/sum',
            type: 'POST',
            data: {
                quantity: quantity,
                postId: postId
            },
            success: function (res) {
                const result = JSON.parse(res);

                $('.subtotal').empty()
                $('.subtotal').append((result / 1).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VND')

                $('#total').empty()
                $('#total').append(((result + 15000) / 1).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VND')
                // const total = result[0].price * quantity

                // $('.subtotal').empty()
                // $('.subtotal').append((total/1).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")  + ' VND')

                // $('#total').empty()
                // $('#total').append(((total+15000)/1).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VND')
            }
        })


    });

});