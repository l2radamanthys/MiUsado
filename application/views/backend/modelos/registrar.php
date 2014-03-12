<h1>Registrar Nuevo Modelo</h1>

<div class="forms">
<?=form_open("modelos/registrar")?>

<p>
<label>Nombre de la Marca:</label>
<select name="fk_id_marcas" id="fk_id_marcas" size="1" onChange="modelosPorMarca(); return false;">
<? foreach($marcas as $marca):?>
    <option value="<?=$marca['id_marcas'];?>"><?=$marca['nombre_marcas'];?></option>
<?endforeach;?>
</select>
</p>

<p>
<label>Nombre del Modelo:</label>
<input type="text" name="nombre_modelos" value="<?=set_value('nombre_modelos')?>"/>
<?=form_error('nombre_modelos');?>
</p>

<p>
<input type="submit" value="Registrar" class="grad-button-blue" />
</p>

</form>
</div>

<div class="" id="result_table">
</div>

