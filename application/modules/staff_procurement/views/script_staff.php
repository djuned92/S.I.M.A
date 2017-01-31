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
                 supplier: {
                    validators: {
                        notEmpty: {
                            message: 'Supplier belum dipilih'
                        }
                    }
                },
                 price: {
                    validators: {
                        notEmpty: {
                            message: 'Price tidak boleh kosong'
                        }
                    }
                },
                 currency: {
                    validators: {
                        notEmpty: {
                            message: 'Currency belum dipilih'
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
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.aset').formValidation({
            framework : 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                item_name: {
                    validators: {
                        notEmpty: {
                            message: 'Item name tidak boleh kosong'
                        }
                    }
                },
                asset_no: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor Asset tidak boleh kosong'
                        }
                    }
                },
                id_category: {
                    validators: {
                        notEmpty: {
                            message: 'Category belum dipilih'
                        }
                    }
                },
                brand: {
                    validators: {
                        notEmpty: {
                            message: 'Brand belum dipilih'
                        }
                    }
                },
                notes: {
                    validators: {
                        notEmpty: {
                            message: 'Notes tidak boleh kosong'
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
                warranty: {
                    validators: {
                        notEmpty: {
                            message: 'Warranty tidak boleh kosong'
                        }
                    }
                },
                exp_date_wrr: {
                    validators: {
                        notEmpty: {
                            message: 'Exp date warranty tidak boleh kosong'
                        }
                    }
                },
                act_condition: {
                    validators: {
                        notEmpty: {
                            message: 'Act Condition tidak boleh kosong'
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
        // e.preventDefault();
        var id_supplier = $("#id_supplier").val();
        $.ajax({
          url:"<?=base_url()?>staff_procurement/purchase_order/supplier/"+id_supplier,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#address").val(data.address);
          } 
        });
    }); 
});
</script>

<script>
$(document).ready(function(){
    $("#id_departement").change(function() {
        var id_departement = $("#id_departement").val();
        $.ajax({
          url:"<?=base_url()?>staff_procurement/purchase_order/departement/"+id_departement,
          type:"GET",
          dataType:"json",
          // data: {},
          success:function(data)
          {
            console.log(data);
            $("#departement_location").val(data.departement_location);
          } 
        });
    }); 
});
</script>