<!-- JavaScript Code -->
<script type="text/javascript">

    function updModelos() {
        var value = $("#fk_id_marcas option:selected").val();
        var params = { 'id': value };
        var controller = "http_response";
        var base_url = "<?=base_url();?>";  

        $.ajax({
            data: params,
            url: base_url + controller + "/modelos_por_marca/",
            type: 'POST',
            success: function(response) {
                var container = $("#fk_id_modelos");
                if (response) {
                    container.html(response);
                }
                else {
                    container.html("<option>No Results</option>");
                }
            },    
        });         
    }
    
    $(document).ready(function() {
        updModelos();
    });
    
</script>
