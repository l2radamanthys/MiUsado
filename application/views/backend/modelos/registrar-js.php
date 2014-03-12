<!-- JavaScript Code -->
<script type="text/javascript">

    function modelosPorMarca() {
        var value = $("#fk_id_marcas option:selected").val();
        var params = { 'id': value };
        var controller = "http_response";
        var base_url = "<?=base_url();?>";  

        $.ajax({
            data: params,
            url: base_url + controller + "/listado_modelos_por_marca/",
            type: 'POST',
            success: function(response) {
                var container = $("#result_table");
                if (response) {
                    container.html(response);
                }
                else {
                    container.html("<p>Error</p>");
                }
            },    
        });         
    }
    
    $(document).ready(function() {
        modelosPorMarca();
    });
    
</script>
