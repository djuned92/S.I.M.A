<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();

        $('#print').on('click',function() {
            window.print();
        })
	});
</script>