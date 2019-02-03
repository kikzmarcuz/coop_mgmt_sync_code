$(document).ready(function(){

    //NAVIGATION
    $("#mr").on("click", function () {
        $("#workarea").load("memberreg.view.php");
    });

    $("#ml").on("click", function () {
        $("#workarea").load("membersearch.view.php");
    });

    //LEDGER
    $("#scl").on("click", function () {
        $("#modalarea").load("membersearchcommon.view.php");
    });

    /*$("#tl").change(function () {
        alert("hi");
        if(this.value == "sc" || this.value == "sd"){
            alert("hi");
            $("#startdate").show();
            $("#enddate").show();
        }
    });*/

    //REPORT
    $("#atr").on("click", function () {
        $("#workarea").load("cashierDailyReport.php");
    });




    //RADIO

});