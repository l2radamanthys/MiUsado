<h1>Canjear Promocion</h1>
<br />
<?=form_open('promociones/canjear');?>
    <p><label>Ingrese el Codigo de la Promocion</label></p><br /> 
    <input type="text" name="codigo_promotions" /> 
    <input type="submit" value="Canjear Codigo" class="grad-button-blue" />
</form>

<br />
<br />
<?if($message != NULL):?>
    <?=$message?>
<?endif;?>

<?=validation_errors();?>
