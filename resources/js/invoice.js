//Js for the invoice view
$(document).ready(function () {
    //Changes the 
    $("#client_id").change(function () {
        $("#clientName").text(
            $("#client_id option:selected").text()
        );
    });

    //Updates the matter text on the invoice when the user tipes in the input feld on with id matter
    $('#matter').on('input propertychange paste', function () {
        $("#matterText").html(
            $("#matter").val()
        );

        let isStringEmpty = $("#matter").val();
        if (!isStringEmpty.trim()) {
            $("#matterText").html("Please enter a matter.");
        }
    });

    //Addes the datepicker
    $("#issuing_date").datepicker({
        dateFormat: 'dd M yy',
        weekStart: 0,
        autoclose: true,
        todayHighlight: true,
    });

    //currency  
    $('#currency_id').change(function () {
        if ($("#currency_id").val() == 1) {
            $("#selectedCurrency").html('&#x20AC');
        } else {
            $("#selectedCurrency").html('&#36');
        }
    });

    //priceWithVAT
    $('#price').on('input propertychange paste', function () {
        if(!isNaN($("#price").val())){
            $("#priceWithVAT").html(
            ($("#price").val() * 1.20).toFixed(2)
        );
        }else{
            $("#priceWithVAT").html("Please enter a number!");
        }

        let isStringEmpty = $("#price").val();
        if (!isStringEmpty.trim()) {
            $("#priceWithVAT").html("0,00");
        }
    });

    //Clears the form
    $("#cleareForm").click(function () {
        $("#invoiceForm")[0].reset();
    });

    // alert for updating posting
    setTimeout(function () {
        $(".alert").slideUp(500);
    }, 4000);
});