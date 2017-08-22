<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();

        $('#print').on('click',function() {
            window.print();
            var from_tgl = $('#from_tgl').val(),
                to_tgl   = $('#to_tgl').val();
            $('.from_tgl').val(from_tgl);
            $('.to_tgl').val(to_tgl);
        });
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.purchase').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	purchase: {
                    validators: {
                        notEmpty: {
                            message: 'Purchase request tidak boleh kosong'
                        }
                    }
                },
                no_purchase: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor purchase request tidak boleh kosong'
                        }
                    }
                },
                date_purchase: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal purchase request tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>