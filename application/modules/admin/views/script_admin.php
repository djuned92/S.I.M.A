<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.user').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	level: {
                    validators: {
                        notEmpty: {
                            message: 'Level User belum dipilih'
                        }
                    }
                },
                nik: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor induk karyawan tidak boleh kosong'
                        }
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Nama lengkap tidak boleh kosong'
                        }
                    }
                },
                id_departement: {
                    validators: {
                        notEmpty: {
                            message: 'Departement belum dipilih'
                        }
                    }
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Ulangi Password tidak boleh kosong'
                        },
                        identical: {
                            field: 'password',
                            message: 'Password tidak sama'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Status belum dipilih'
                        }
                    }
                },
            }
        });
    });
</script>