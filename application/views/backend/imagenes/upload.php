

<?=form_open('autos/subir_imagenes');?>
    <?php
    echo form_label('File:','file');
    $data = array(  
        'id' => 'txtFileName',
        'value' => '',
        'size' => 5,
    'disabled' => 'disabled',
    'style' => 'border: solid 1px; background-color: #FFFFFF;');
    echo form_input($data); //Insertamos el campo de texto que recibirá el nombre del archivo una vez subido
    ?>

    <span id="spanButtonPlaceholder"></span>

    <input type="hidden" name="hidFileID" id="hidFileID" value="" />

    <?php
    echo "<br />";
    $extra = 'id="btnSubmit"';
    echo form_submit('upload','Send',$extra);
    echo form_close();
    ?>

<div id="fsUploadProgress"></div>

<div class="images" id="images">
</div>
