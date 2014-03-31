<h1>Nueva Publicacion</h1>
<br />  
<h3>Especifique los componentes de Exterior del Vehiculo</h3> 
<br />

<?=form_open('autos/seleccionar_exterior/'.$id_autos);?>
<? foreach($exterior as $row): ?>
    <input type="checkbox" name="ext_<?=$row['id_exterior'];?>" value="1"/>
    <?=$row['nombre_exterior'];?><br />
<? endforeach; ?>
<input type="hidden" name="q" value="1" />
<input type="hidden" name="n" value="<?=$new;?>" />


<br />
<input type="submit" class="grad-button-blue"/>
</form>
