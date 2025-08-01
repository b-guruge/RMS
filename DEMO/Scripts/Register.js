$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    
});

$(document).ready(function () {
    $(":text").focus(function () {
        if ($(this).closest(".form-group").hasClass("has-error"))
            $(this).closest(".form-group").removeClass("has-error");
    });
    $(":password").focus(function () {
        if ($(this).closest(".form-group").hasClass("has-error"))
            $(this).closest(".form-group").removeClass("has-error");
    });
    $("#Email").focus(function () {
        if ($(this).closest(".form-group").hasClass("has-error"))
            $(this).closest(".form-group").removeClass("has-error");
    });
});

function clearFields() {
    $("#Email").val("");
    $("#Kname").val("");
    $("#Lname").val("");
    $("#UserName").val("");
    $("#Password").val("");
    $("#ConPassword").val("");

    $("#salutation").val('-1');
    $('#salutation').select2().trigger('change');
}


function insertUser() {
    /*POST*/

    var errorList = []; //for storing each error

    if ($.trim($("#Password").val()) !== $.trim($("#ConPassword").val())) {
        Lobibox.notify("warning", { title: "Password Mismatch", msg: "Please Re-Enter your new password" });
        $("#Password").val(""); //Clearing new password
        $("#ConPassword").val(""); //Clearing new password confirm
        $("#Password").focus();
        return;
    }
    else if($.trim($("#salutation").val()) == "-1")
    {
        Lobibox.notify("warning", { title: "Salutation", msg: "Please select a salutation" });
        return;
    }
    else if($.trim($("#country").val()) == "-1")
    {
        Lobibox.notify("warning", { title: "Password Mismatch", msg: "Please select a country" });
        return;
    }

    if ($.trim($("#Email").val()) == "" || !check_email($("#Email").val())) {
        errorList.push("#Email");
    }
    if ($.trim($("#Kname").val()) == "" || !check_alpha($("#Kname").val())) {
        errorList.push("#Kname");
    }
    if ($.trim($("#Lname").val()) == "" || !check_alpha($("#Lname").val())) {
        errorList.push("#Lname");
    }
    if ($.trim($("#UserName").val()) == "") {
        errorList.push("#UserName");
    }
    if ($.trim($("#Password").val()) == "") {
        errorList.push("#Password");
    }
    if ($.trim($("#ConPassword").val()) == "") {
        errorList.push("#ConPassword");
    }
    if (errorList.length > 0) {
        $.each(errorList, function (index, value) {
            $(value).closest(".form-group").addClass("has-error");
        });
        Lobibox.notify("warning", { title: "Details Required", msg: "Please insert correct details!" });
    }
    else {
        var Email = $("#Email").val();
        var KnownName = $("#Kname").val();
        var LastName = $("#Lname").val();
        var UserName = $("#UserName").val();
        var Password = $("#Password").val();
        var ConPassword = $("#ConPassword").val();
        var Salutation = $("#salutation").val();

        $.post("controller/getDB.php",{
           method:"user_registration",
           Email:Email,
           KnownName:KnownName,
           LastName:LastName,
           UserName:UserName,
           Password:Password,
           ConPassword:ConPassword,
           Salutation:Salutation
        },
        function(ret){
            var data = $.parseJSON(ret);
            if(data[0]["RET"] == "user")
            {
                $("#UserName").val('');
                $("#UserName").closest(".form-group").addClass("has-error");
                Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "USERNAME", msg: "Username Already Exists" });
            }
            else if (parseInt(data[0]["RET"]) > 0) {
                clearFields();
                Lobibox.notify("success", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Congratulations!", msg: "Please get the admin approval in order to use your login!" });
            }
            else {
                Lobibox.notify("error", { title: "Failed!", msg: "Some error occured. Please try again after some time." });
            }
        });

    }
    
    
}
