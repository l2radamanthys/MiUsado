
<h1>Nueva Publicacion</h1>
<br />

<?=validation_errors();?>

<br />
<div class="forms">
<?=form_open('autos/registrar/');?>
    <p>
        <label>Marca:</label>
        <select name="fk_id_marcas" id="fk_id_marcas" size="1" onchange="updModelos(); return false;">
        <? foreach($marcas as $marca):?>
            <option value="<?=$marca['id_marcas'];?>"><?=$marca['nombre_marcas'];?></option>
        <?endforeach;?>
        </select>
    </p>

    <p>
        <label>Modelo:</label>
        <select name="fk_id_mdelos" id="fk_id_modelos" size="1">
         
        </select>
    </p>

    <p>
        <label>Segmento:</label>
        <select name="segmento_autos" id="segmento_autos" size="1">
                <option value="Sin Definir">Sin Definir</option>
                <option value="Camioneta">Camioneta</option>
                <option value="Convertible">Convertible</option>
                <option value="Coupe">Coupe</option>
                <option value="Familiar">Familiar</option>
                <option value="HatchBank">HatchBank</option>
                <option value="Monovolumen">Monovolumen</option>
                <option value="Pick Up">Pick Up</option>
                <option value="Sedan">Sedan</option>
                <option value="Utilitario">Utilitario</option>
        </select>
    </p>
    
    <p>
        <label>A&ntilde;o:</label>
        <input type="text" name="year_autos" value="<?=set_value('year_autos');?>" id="year_autos" size="11" maxlength="11" class="text"><br/><br/>
    </p>

    <p>
        <label>Kilometros:</label>
        <input type="text" name="km_autos" id="km_autos" value="<?=set_value('km_autos')?>" size="11" maxlength="11" class="text"><br/><br/>
    
    </p>

    <p>
        <label>Motor Caballos de Fuerza:</label>
        <input type="text" name="motor_cv_autos" value="<?=set_value('motor_cv_autos');?>" id="motor_cv_autos" size="11" maxlength="11" class="text">
        <?=form_error('motor_cv_autos');?>
    </p>

    <p>
        <label>Motor Cilindradas:</label>
        <input type="text" name="motor_cilindrada_autos" value="<?=set_value('motor_cilindrada_autos');?>" id="motor_cilindrada_autos" size="5" maxlength="5" class="text"> 
        <?=form_error('motor_cilindrada_autos');?>
    </p>

    <p>
        <label>Direccion:</label></td>
        <select name="direccion_autos">
            <option value="Asistida">Asistida</option>
            <option value="Mecanica">Mecanica</option>
            <option value="Hidraulica">Hidraulica</option>
        </select>
    </p>

    <p>
        <label>Numero de Puertas:</label>
        <input type="text" name="puertas_autos" id="puertas_autos" value="<?=set_value('puertas_autos');?>"size="11" maxlength="11" class="text">
        <?=form_error('puertas_autos');?>
    </p>


    <p>
        <label>Titulo de la Publicacion:</label>        
        <textarea name="titulo_autos" id="titulo_autos" rows="2" cols="50" class="textarea"><?=set_value('titulo_autos');?></textarea>        
        <?=form_error('titulo_autos');?>
    </p>

    <p>
        <label>Descripcion:</label>        
        <textarea name="descripcion_autos" id="descripcion_autos" rows="4" cols="50" class="textarea"><?=set_value('descripcion_autos');?></textarea>
        <?=form_error('descripcion_autos');?>
    </p>

    <p>
        <label>Precio:</label>
        <input type="text" name="precio_autos" id="precio_autos" value="<?=set_value('precio_autos');?>" size="9" maxlength="9" class="text">
        <?=form_error('precio_autos');?>
    </p>

    <p>
        <input type="submit" value="Registrar" class="grad-button-blue"/>
    </p>
</form>
</div>
