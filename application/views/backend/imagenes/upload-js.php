
<script type="text/javascript" src="<?=base_url();?>media/scripts/swfupload.js"></script> 

<script type="text/javascript">
    var swfu;

    $(document).ready(function() {
        var swfu_settings = {
            'upload_url' : '<?=base_url();?>';
            'flash_url' : '<?=base_url;?>media/swf/swfupload.swf',
            'file_size_limit' : "5 MB",
            'file_upload_limit' : 15,
        };
        swfu = new SWFUpload(swfu_settings);
        
    });

</script>


