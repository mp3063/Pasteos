var client = new ZeroClipboard($(".copy-button"));

client.on("ready", function (readyEvent) {
    // alert( "ZeroClipboard SWF is ready!" );

    client.on("aftercopy", function (event) {
        // `this` === `client`
        // `event.target` === the element that was clicked
        event.target.style.display = "none";
    });
});
$(document).ready(function () {
    $("div.alert").not(".alert-important").delay(3000).slideUp(600);
    $(".delete").click(function (e) {
        var url = $(this).attr("href");
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will delete all steps associated with this headline!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (confirmed) {
            if (confirmed == true) {
                $(location).attr('href', url);
            }
            else {
                swal("Cancelled", "Your pasteos is safe :)", "error");
            }
        });
    });
});

