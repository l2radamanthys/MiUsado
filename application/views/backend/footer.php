        </div>

        <script type="text/javascript">
          $(function() {
            $( "#menu-accordion" ).accordion({
                collapsible: true,
                navigation: true,
                clearStyle: true
            });
          });
          </script>
        
        <div class="sub">
            <div class="sub-cont">
                <ul class="submenu">
                    <li><a href="<?=base_url();?>backend/" title="">Ir al Panel Principal</a></li>
                </ul>
            
                <div id="menu-accordion">
                    <p>Publicaciones Autos</p>
                    <div>
                        <ul class="submenu">
                            <li><a href="<?=base_url();?>backend/nueva_publicacion/" title="">Nueva</a></li>
                            <li><a href="<?=base_url();?>backend/" title="">Activas</a></li>
                            <li><a href="<?=base_url();?>backend/" title="">Inactivas</a></li>
                            <li><a href="<?=base_url();?>backend/autos/all/" title="">Todas</a></li>
                        </ul>
                    </div>
                    
                    <p>Creditos</p>
                    <div>
                        <ul class="submenu">
                            <li><a href="" title="">Cargar Credito</a></li>
                            <li><a href="" title="">Historial Cargas Creditos</a></li>
                            <li><a href="<?=base_url();?>backend/promociones/canjear/" title="">Cargar Codigo Promocion</a></li>
                        </ul>
                    </div>
                    
                    <p>Datos del Usuario</p>
                    <div>
                        <ul class="submenu">
                            <li><a href="" title="">Mis Datos</a></li>
                            <li><a href="" title="">Modificar mis Datos</a></li>
                            <li><a href="" title="">Cambiar Contraseña</a></li>
                            <li><a href="" title="">Cerrar Session</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div style="clear:both;"></div>
    
</body>

</html>
