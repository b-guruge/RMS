function LogUser() {
    /*POST*/
    $("#loader").css('display', '');
    var Company = $("#Company").val();
    var UserName = $("#UserName").val();
    var Password = $("#Password").val();
    var RememberMe = false;
    if ($('#ChkRem').iCheck('update')[0].checked)
        RememberMe = true;
    else
        RememberMe = false;

    if ($.trim(UserName) == "" || $.trim(Password) == "") {
        Lobibox.notify("warning",
            {
                msg: "Please Enter the Details First!"
            });
            $("#loader").css('display', 'none');
        return;
    }

    if(Company == "-1")
    {
        Lobibox.notify("warning",
            {
                msg: "Please Select a Company!"
            });
            $("#loader").css('display', 'none');
        return;
    }

    $.post("controller/getDB.php",{
        method:"user_login",
        UserName:UserName,
        Password:Password,
        RememberMe:RememberMe,
        Company:Company
     },
     function(ret){
         var data = ret.replace(/"/g, "");
         if(data == "1")
         {
            clear_fields();
            $(location).attr('href', 'index.php');
            //Lobibox.notify("success", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Congratulations!", msg: "Done" });
         }
         else if (data == "02") {
            $("#Password").val('');
            Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "ADMIN Approval Needed!", msg: "Please get the admin approval in order to use your login!" });
            $("#loader").css('display', 'none');
         }
         else if (data == "03") {
            clear_fields();
            Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Credentials", msg: "Invalid Username/Password!" });
            $("#loader").css('display', 'none');
         }
         else {
             clear_fields();
             Lobibox.notify("error", { title: "Failed!", msg: "Some error occured. Please try again after some time." });
             $("#loader").css('display', 'none');
         }
     });

    /*$.ajax({
        url: '/Login/Login',
        dataType: "json",
        type: "POST",
        contentType: 'application/json; charset=utf-8',
        data: '{userDet: ' + JSON.stringify(userDet) + '}',
        success: function (ret) {
            if (ret.resultID == "1") {
                clear_fields();
                $(location).attr('href', '../../Home');
                //$("#loader").css('display', 'none');
            }
            else if (ret.resultID == "01") { //validation error
                clear_fields();
                Lobibox.notify("error", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Data Validation", msg: ret.result });
                $("#loader").css('display', 'none');
            }
            else if (ret.resultID == "02") { //no admin approval
                $("#Password").val('');
                Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "ADMIN Approval Needed!", msg: ret.result });
                $("#loader").css('display', 'none');
            }
            else if (ret.resultID == "03") { //Invalid username/password
                clear_fields();
                Lobibox.notify("warning", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Credentials", msg: ret.result });
                $("#loader").css('display', 'none');
            }
            else if (ret.resultID == "0") { //general error
                clear_fields();
                Lobibox.notify("error", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Error!", msg: ret.result });
                $("#loader").css('display', 'none');
            }
            else { //any unknown error
                clear_fields();
                Lobibox.notify("error", { pauseDelayOnHover: true, continueDelayOnInactiveTab: false, title: "Error!", msg: "Unknown Error Occured. Please try again.!" });
                $("#loader").css('display', 'none');
            }

        },
        error: function (xhr) {
            clear_fields();
            Lobibox.notify("error", { title: "Error", msg: "JSON error occured!" });
            $("#loader").css('display', 'none');
        }
    })*/

}

function clear_fields() {
    $("#UserName").val('');
    $("#Password").val('');
}