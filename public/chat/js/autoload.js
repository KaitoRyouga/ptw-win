$(document).ready(function () {

    
    function getMsg() {

        var username = "";
        var fromUser = "";
        var toUser = "";

        $.ajax({
            url: '/get-session',
            type: 'GET',
            success: function (res) {
                const result = JSON.parse(res);
                username = result.username
                fromUser = result.fromUser
                toUser = result.toUser
            }
        }).then(() => {

            // console.log("username: ", username)
            // console.log("fromUser: ", fromUser)
            // console.log("toUser: ", toUser)

            if (fromUser !== toUser && toUser !== undefined) {
                $.ajax({
                    url: '/get-msg',
                    type: 'POST',
                    data: {
                        lChat: $(".lMess").length,
                        rChat: $(".mMess").length,
                        fromUser: fromUser,
                        toUser: toUser
                    },
                    success: function (res) {

                        if (res.length !== 2) {
                            $('.chatMessages').empty();
                            const result = JSON.parse(res);
                            let mess = result[1].concat(result[0]);

                            mess.sort(function (a, b) {
                                var keyA = new Date(a.created_at),
                                    keyB = new Date(b.created_at);

                                if (keyA < keyB) return -1;
                                if (keyA > keyB) return 1;
                                return 0;
                            });

                            mess.forEach((resp) => {
                                if (resp.fromUser === fromUser && resp.body !== "") {
                                    mess = $(`
                                        <div class="message mMess">
                                            <div class="messArea">
                                                <p id="sname">${username}</p>
                                                <div class="textM">${resp.body}</div>
                                            </div>
                                            <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg">
                                        </div>
                                    `);
                                } else if (resp.body !== "") {
                                    mess = $(`
                                        <div class="message lMess">
                                            
                                                <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg">
    
                                            <div class="messArea">
                                                <div class="textM">${resp.body}</div>
                                            </div>
                                        </div>
                                    `);
                                }

                                $("[class='chatMessages']").append(mess);
                            });
                        }
                    }
                });
            }
        })

    }

    $.ajaxSetup({ cache: false });

    setInterval(getMsg, 1000);

});