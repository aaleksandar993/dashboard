$('form.contactAdd').submit(function(event) {
    event.preventDefault();
        $("form.contactAdd").validate({
        errorClass: "text-danger border-danger",
        rules: {
            "name":"required",
            "email":"required",
            "role":"required",
            "phone":"required",
        }
    })
    
    var frm = $('.contactAdd');

    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data) {
            var data = JSON.parse(data);
            if (data.statusCode == 200) {
                $("#contactSaveButton").removeAttr("disabled");
                $('.contactAdd').find('input').val('');
                $.notify("Contact added successfully !", {
                    globalPosition: 'top left',
                    style: 'bootstrap',
                    className: 'success'
                });
                window.location.reload();
            } else if (data.statusCode == 201) {


                                $.confirm({
                                    title: 'Hi '+data.name,
                                    content: 'Please fill all required fields before submitting',
                                    type: 'red',
                                    buttons: {
                                        ok: {
                                            text: "ok!",
                                            btnClass: 'btn-danger',
                                            keys: ['enter'],
                                            action: function() {
                                                console.log('the user clicked confirm');
                                            }
                                        },
                                        cancel: function() {
                                            console.log('the user clicked cancel');
                                        }
                                    }
                                });
            }
        },
        error: function(data) {
            $.notify("You have wrong inputs!", "error");
        },
    });
});