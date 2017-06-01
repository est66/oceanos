var WS = "ws://127.0.0.1:8989";

// Variables globales
var templateMsg;
var templateUser;
var webSocket;

$.holdReady(true);

function createWebSocket () {
    webSocket = new WebSocket(WS);
    webSocket.onopen = function(e) {
        console.log('connection successful');
        $.holdReady(false);
    };
    webSocket.onclose = function(e) {
        console.log('disconnection successful');
    };
    webSocket.onmessage = function(response) {
        var result = JSON.parse(response.data);
        console.log('recieved: ');
        console.log(result);
        if (result.status == 'error') {
            return
        }
        console.log('trigger ' + result.action);
        $('#chat').trigger(result.action, result.data);
    };
    webSocket.sendJson = function (data) {
        var sending = JSON.stringify(data);
        console.log('sending: ');
        console.log(sending)
        this.send(sending);
    }
}

createWebSocket();

$(function () {
    templateMsg = $(".templateMsg").clone();
    templateMsg.removeClass('template');
    templateUser = $(".templateUser").clone();
    templateUser.removeClass('template');
    $("#nickname").focus();
    $("#btnLogin").on("click", login);
    $("#btnLogout").on("click", logout);
    $("#nickname").on("keyup", loginOnEnter);
    $("#msg").on("keyup", sendOnEnter);
    $("#btnSend").on("click", sendMsg);
    $("#chat").on("login", function () {
        $("#login").hide();
        $("#chat").show();
        $("#messages").empty();
        $("#msg").val('');
        $("#msg").focus();
        webSocket.sendJson({action: "usersList"});
    });
    $("#chat").on("logout", function () {
        createWebSocket();
        $("#chat").hide();
        $("#login").show();
        $("#nickname").focus();
    })
    $("#chat").on("send", function (evt, data) {
        addMsg(data);
    });
    $("#chat").on("connection", function (evt, user) {
        addUser(user);
    });
    $("#chat").on("disconnection", function (evt, username) {
        removeUser(username);
    });
})


function sendMsg() {
    var msg = $("#msg").val();
    webSocket.sendJson({
        action: "send",
        msg: msg
    });
    $("#msg").val('');
    $("#msg").focus();
}

function addMsg(data) {
    var tmpl = templateMsg.clone();
    $(".username", tmpl).text(data.email);
    $(".message", tmpl).text(data.msg);
    tmpl.appendTo("#messages");
    // auto-scroll vers le bas du chat
    $("#messages").scrollTop($("#messages").prop('scrollHeight'));
}

function addUser(user) {
    if ($('#' + user.id).length > 0) return;
    var tmpl = templateUser.clone();
    tmpl.attr('id', user.id);
    $(".usernameOnline", tmpl).text(user.email);
    tmpl.appendTo("#usersList");
}

function removeUser(user) {
    $('#' + user.id).remove();
}

function loginOnEnter(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode == 13) {
       login();
    }
}

function sendOnEnter(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode == 13) {
        sendMsg();
    }
}

function login() {
    var email = $("#email").val();
    var password = $("#password").val();
    $(".warning").hide();
    webSocket.sendJson({
        action: "login",
        email: email,
        password: password
    });
}

function logout() {
    webSocket.close();
    $("#chat").trigger("logout")
}