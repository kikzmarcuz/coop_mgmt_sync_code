$(document).ready(function(){

    //NAVIGATION
    $("#mr").on("click", function () {
        $("#workarea").load("memberreg.view.php");
    });

    $("#ml").on("click", function () {
        $("#workarea").load("membersearch.view.php");
    });


    //REPORT
    $("#atr").on("click", function () {
        $("#workarea").load("cashierDailyReport.php");
    });


    //RADIO
    $('input[name=gender]').is("checked", function () {
    });

    $('input[name=civilStatus]').is("checked", function () {
    });

    $('input[name=typeMembership]').is("checked", function () {
    });

});