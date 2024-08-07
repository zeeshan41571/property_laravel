$(document).ready(function () {

    // addrow();

    // Set the unique link on page load

    const uniqueLink = generateUniqueLink();
    $("#uniqueLink").val(uniqueLink);

    const uniqueLinkOwner = generateUniqueLinkOwn();
    $("#ownLink").val(uniqueLinkOwner);


    // Function to generate a unique link
    function generateUniqueLink() {
        const uniqueId = Math.random().toString(36).substr(2, 9);
        return `https://example.com/form.html?uid=${uniqueId}`;
    }

    // Function to generate a unique link for Owner
    function generateUniqueLinkOwn() {
        const uniqueLinkId = Math.random().toString(36).substr(2, 9);
        return `https://example.com/form.html?uid=${uniqueLinkId}`;
    }



    // Copy the unique link to clipboard
    // $("#copyButton").click(function () {

    //     const uniqueLinkInput = $("#uniqueLink");
    //     uniqueLinkInput.prop("readonly", false); // Temporarily make the input editable
    //     uniqueLinkInput.select();
    //     document.execCommand("copy");
    //     uniqueLinkInput.prop("readonly", true); // Set it back to readonly
    //     alert("Link copied to clipboard!");
    // });


    // Copy the unique link to clipboard
    $("#copyButton").click(async function () {
        const uniqueLinkInput = $("#uniqueLink").val();
        try {
            await navigator.clipboard.writeText(uniqueLinkInput);
            alert("Link copied to clipboard!");
        } catch (err) {
            console.error('Failed to copy: ', err);
            alert("Failed to copy the link.");
        }
    });


    // Copy the unique link to clipboard
    $("#btnCoOwner").click(async function () {
        const uniqueLinkInputO = $("#ownLink").val();
        try {
            await navigator.clipboard.writeText(uniqueLinkInputO);
            alert("Link copied to clipboard!");
        } catch (err) {
            console.error('Failed to copy: ', err);
            alert("Failed to copy the link.");
        }
    });

    $(document).on('click', '.deleteRow', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    function updateSerialNumbers() {
        let number = 1;
        $('#tbody tr').each(function () {
            $(this).find('.serialno').text(number);
            number++;
        });
    }

    $('#newInstruction').click(function () {
        var rowCount = $('#insbody tr').length + 1;
        const newRowIns = `<tr id="rowIns" class="rowIn">
                                <td class="sNo">${rowCount}</td>
                                <td><input type="text" name="instruction[]" id="" required></td>                  
                                <td class="deleteIns"><button type="button" onclick="delrowIns(this)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Remove</button></td>
                            </tr>`;
        $('#insbody').append(newRowIns);
    });

    $(document).on('click', '.deleteIns', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers();
    });

    function updateSerialNumbers() {
        let insNumber = 1;
        $('#insbody tr').each(function () {
            $(this).find('.sNo').text(insNumber);
            insNumber++;
        });
    }

})

$('#btnEmail').on('click', function() {
    $('#popupOverlay').fadeIn();
    $('#emailPopup').fadeIn();
});

$('#closePopup, #popupOverlay').on('click', function() {
    $('#popupOverlay').fadeOut();
    $('#emailPopup').fadeOut();
});

// $('#emailForm').on('submit', function(event) {
//     event.preventDefault();
    
//     let bookingId = $('#bookingId').val();
//     let email = $('#email').val();
//     let _token = $('input[name="_token"]').val();

//     $.ajax({
//         url: '{{route("generate.pdf")}}',
//         method: 'POST',
//         data: {
//             bookingId: bookingId,
//             email: email,
//             _token: _token
//         },
//         success: function(response) {
//             alert(response.message);
//             $('#popupOverlay').fadeOut();
//             $('#emailPopup').fadeOut();
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//         }
//     });
// });
// function addrow() {
//     console.log('Hi');
//     const rows = document.querySelectorAll('#tbody tr');
//     rows.forEach((row, index) => {
//         row.cells[0].textContent = index + 1;
//     });
//     var row = $('#trow').clone().appendTo("#tbody");
//     row.removeClass("row");

// }


// function delrow(v) {
//     $(v).parent().parent().remove();
// }

// function addrowIns() {

//     const rowIns = document.querySelectorAll('#tbodyIns tr');
//     rowIns.forEach((rowIns, index) => {
//         rowIns.cells[0].textContent = index + 1;
//     });
//     var rowIn = $('#rowIns').clone().appendTo("#tbodyIns");
//     rowIn.removeClass("rowIn");

// }

// function delrowIns(v) {
//     $(v).parent().parent().remove();
// }