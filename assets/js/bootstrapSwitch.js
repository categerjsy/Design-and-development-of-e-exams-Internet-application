// Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
        $("[name='checkbox2']").change(function() {
            if(!confirm('Do you wanna cancel me!')) {
                this.checked = true;
            }
        });

        $('#after').bootstrapNumber();
        $('#colorful').bootstrapNumber({
            upClass: 'success',
            downClass: 'danger'
        });