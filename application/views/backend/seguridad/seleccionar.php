<h1>Nueva Publicacion</h1>
<br />  
<h3>Especifique los componentes de Confort del Vehiculo</h3> 
<br />

<?=form_open('autos/seleccionar_seguridad/'.$id_autos);?>
<? foreach($seguridad as $row): ?>
    <input type="checkbox" name="seg_<?=$row['id_seguridad'];?>" value="1"/>
    <?=$row['nombre_seguridad'];?><br />
<? endforeach; ?>
<input type="hidden" name="q" value="1" />
<input type="hidden" name="n" value="<?=$new;?>" />


<br />
<input type="submit" class="grad-button-blue"/>
</form>
