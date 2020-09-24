jQuery(document).ready(function ($) {

    $(document).on('click', '.mec-invoice-export-attendees-as-contact', function () {
        var ID = $(this).data('id');
        var eOccurrence = $(this).data('occurrence');
        $.ajax({
            type: "post",
            url: ajaxurl,
            data: {
                action: 'export_attendees_as_csv',
                eventID: ID,
                occurrence: eOccurrence
            },
            success: function (response, status, xhr) {
                // check for a filename
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                var type = xhr.getResponseHeader('Content-Type');
                var blob = new Blob([response], {
                    type: type
                });

                if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");
                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location.href = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.click();
                        }
                    } else {
                        window.location.href = downloadUrl;
                    }

                    setTimeout(function () {
                        URL.revokeObjectURL(downloadUrl);
                    }, 100); // cleanup
                }
            }
        });
    });

    $(document).on('click', '.mec-invoice-meta-box .mec-attendee .checked-in-status', function () {
        var Confirm = confirm("Are you sure to do this?");
        var self = $(this);
        if (Confirm) {
            self.parent().addClass('loading');
            $.ajax({
                type: "post",
                url: ajaxurl,
                data: {
                    action: 'mec_invoice_change_ticket_status',
                    book_id: self.data('id'),
                    me: self.data('me'),
                    place: self.data('place'),
                    invoice_id: self.data('invoice-id')
                },
                dataType: "json",
                success: function (response) {
                    self.removeClass('status-no').removeClass('status-yes');
                    self.html(response.text);
                    self.addClass('status-' + response.status);
                    self.siblings('.mec-invoice-ticket-checked-in-date').find('span').html(response.checked_time);
                    self.parent().removeClass('loading');
                }
            });
        }
    })
})