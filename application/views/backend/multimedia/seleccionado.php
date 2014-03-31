<h1>Multimedia</h1>
<br />

<table class="ctable" style="width: 600px; margin: 0 auto">
<?foreach($multimedia as $mult):?>
    <tr>
        <td><?=$mult;?></td>
    </tr>
<?endforeach;?>
</table>

<br />
<a href="<?=base_url();?>autos/show/<?=$id_autos;?>/" title="">Continuar</a>
