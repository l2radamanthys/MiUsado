
<script type="text/javascript" src="<?=base_url();?>media/scripts/swfupload.js"></script> 

<script type="text/javascript">
    var swfu;

    //$(document).ready(function() {
    window.onload = function () {

        var swfu_settings = {
            file_post_name: "resume_file",
            upload_url : '<?=base_url();?>http_response/upload_image/';
            flash_url : '<?=base_url();?>media/swf/swfupload.swf',
            file_types_description : "Image Files",
            file_size_limit : "5 MB",
            file_upload_limit : 15,
            file_queue_limit : 1,
            
            // Event handler settings
            
            // Flash file settings
            swfupload_loaded_handler : swfUploadLoaded,file_dialog_start_handler: fileDialogStart,
            file_queued_handler : fileQueued,
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            //upload_start_handler : uploadStart,    // I could do some client/JavaScript validation here, but I don't need to.
            swfupload_preload_handler : preLoad,
            swfupload_load_failed_handler : loadFailed,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,

            // Button Settings
            //button_image_url : "<?php echo base_url();?>img/upload_flash_button_61x22.png",
            button_placeholder_id : "spanButtonPlaceholder",
            button_width: 61,
            button_height: 22,

            custom_settings : {
                progress_target : "fsUploadProgress",
                upload_successful : false
            },
            // Debug settings
            debug: true

        };
        swfu = new SWFUpload(swfu_settings);
        
    });

</script>


