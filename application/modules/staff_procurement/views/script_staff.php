<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.purchase_order').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	po_no: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor purchase order tidak boleh kosong'
                        }
                    }
                },
                po_date: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal purchase order tidak boleh kosong'
                        }
                    }
                },
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.supplier').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                supplier_code: {
                    validators: {
                        notEmpty: {
                            message: 'Kode supplier tidak boleh kosong'
                        }
                    }
                },
                supplier_name: {
                    validators: {
                        notEmpty: {
                            message: 'Nama supplier tidak boleh kosong'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat tidak boleh kosong'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Phone tidak boleh kosong'
                        },
                        digits: {
                        message: 'Phone harus berupa angka'
                      }
                    }
                },
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.invoice').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                id_supplier: {
                    validators: {
                        notEmpty: {
                            message: 'Supplier belum dipilih'
                        }
                    }
                },
                invoice_no: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor invoice tidak boleh kosong'
                        }
                    }
                },
                invoice_date: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal invoice tidak boleh kosong'
                        }
                    }
                },
                date_received: {
                    validators: {
                        notEmpty: {
                            message: 'Invoice date received tidak boleh kosong'
                        }
                    }
                },
                price: {
                    validators: {
                        notEmpty: {
                            message: 'Price tidak boleh kosong'
                        },
                        digits: {
                        message: 'Price harus berupa angka'
                      }
                    }
                },
            }
        });
    });
</script>

<script>
$(document).ready(function(){
    $("#id_supplier").change(function() {
        var id_supplier = $("#id_supplier").val();
        $.ajax({
          url:"<?=base_url()?>staff_procurement/invoice/supplier/"+id_supplier,
          type:"GET",
          dataType:"json",
          data: {},
          success:function(data)
          {
            console.log(data)
          } 
        });
    }); 
});
</script>