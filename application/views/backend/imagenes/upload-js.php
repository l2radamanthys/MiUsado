
<script type="text/javascript" src="<?=base_url();?>media/scripts/jquery.uploadify.js"></script> 



<script type="text/javascript">
    

    $(document).ready(function() {
        $('#file_upload').uploadify({
            'swf'      : '<?=base_url();?>media/swf/uploadify.swf',
            'uploader' : '<?=base_url();?>http_response/upload_image/',
            // Your options here

            'method': 'post',
            'formData': {
                'id' : '<?=$auto['id_autos'];?>' //ID del Auto
            }, 


            //estilo
            'buttonText': 'Seleccionar Fotos',
            'buttonClass': 'grad-button-blue',
            'width': 140,

            //eventos
            /*'onUploadSuccess' : function(file, data, response) {
                alert('The file was saved to: ' + data);
            }*/
        });
    });

</script>


