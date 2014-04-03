<h1>Canjear Promocion</h1>
<br />
<div class="forms">
<?=form_open('backend/promociones/canjear');?>
    <p><label>Por Fabor ingrese el codigo de la Promocion</label></p><br />
    <p style="text-align:center">
        <input type="text" name="codigo_promotions" /> 
        <input type="submit" value="Canjear Codigo" class="grad-button-blue" />
    </p>
</form>
</div>

<br />
<br />
<?if($message != NULL):?>
    <?=$message?>
<?endif;?>

<?=validation_errors();?>
