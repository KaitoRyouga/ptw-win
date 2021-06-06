$(document).ready(function () {
    function sendMsg() {

        const body_msg = $('#message').val();

        var fromUser = "";
        var toUser = "";
        var username = "";

        $.ajax({
            url: '/get-session',
            type: 'GET',
            success: function (res) {
                const result = JSON.parse(res);
                fromUser = result.fromUser
                toUser = result.toUser
                username = result.username
            }
        }).then(() => {
            $.ajax({
                url: '/send-msg',
                type: 'POST',
                data: {
                    fromUser: fromUser,
                    toUser: toUser,
                    body_msg: body_msg
                }, success: function () {
                    $('#message').val('');
                    mess = $(`
                        <div class="message mMess">
                            <div class="messArea">
                                <p id="sname">${username}</p>
                                <div class="textM">${body_msg}</div>
                            </div>
                            <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg">
                        </div>
                    `);
                    $("[class='chatMessages']").append(mess);
                }
            });
        })
    }

    $(document.body).on('click', '.button-s1', function () {

        sendMsg()

    });

    $(document.body).on('keypress', '#message', function () {

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            sendMsg();
        }

    });

    $(document.body).on('click', '.user-item', function (res) {

        const toUser = res.currentTarget.dataset.id;
        const toUserName = res.currentTarget.dataset.name;

        nameC = $(`
            <p class="roomTitle" id="titleFirst">${toUserName}</p>
        `);

        $('.nameC').empty()
        $('.nameC').append(nameC)

        $.ajax({
            url: '/send-touser',
            type: 'POST',
            data: {
                toUser: toUser
            }, success: function (res) {

            }
        });

    });

    $(document.body).on('click', '#search', function (res) {

        const search = $("input[name='search']").val()

        $.ajax({
            url: '/search-user',
            type: 'POST',
            data: {
                search: search
            }, success: function (res) {
                if (res.length !== 2) {

                    const result = JSON.parse(res)

                    $('.result-user').empty()

                    result.forEach((r) => {
                        mess = $(`
                            <div>
                                <button type="button" id="button-user" data-name="${r.username}" data-id="${r.userId}" class="btn btn-light" data-dismiss="modal">${r.username}</button>
                            </div>
                            <br/>
                        `);

                        $('.result-user').append(mess)
                    })
                } else {
                    $('.result-user').empty()
                }
            }
        });

    });

    $(document.body).on('click', '#button-user', function (res) {

        const newUser = res.target.dataset.id;

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

    });

});
