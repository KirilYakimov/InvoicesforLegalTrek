//Js for the invoice view
$(document).ready(function () {
    //Changes the 
    $("#client_id").change(function () {
        $("#clientName").text(
            $("#client_id option:selected").text()
        );
    });

    //Updates the matter text on the invoice when the user tipes in the input feld on with id matter
    $("#matter").keypress(function () {
        $("#matterText").html(
            $("#matter").val()
        );


    });
    $("#matter").change(function () {
        let isStringEmpty = $("#matter").val();
        if (!isStringEmpty.trim()) {
            $("#matterText").html("Please enter a matter.");
        }
    })

    //Addes the datepicker
    $("#date").datepicker({
        dateFormat: 'dd M yy',
        weekStart: 0,
        autoclose: true,
        todayHighlight: true,
    });
    //Clears the form
    $("#cleareForm").click(function() {
         $("#invoiceForm")[0].reset();
    });
});