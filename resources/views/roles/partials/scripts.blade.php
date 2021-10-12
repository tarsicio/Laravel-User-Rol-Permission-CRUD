<!--Script para generar los Permisos del ROL o Perfil -->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
{{--<script src="{{ asset('ajax/js/jquery.min.js') }}"></script>--}}
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('ajax/js/bootstrap.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('ajax/js/jquery.multi-select.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<!--  El siguiente script permite asignar los permiso al Rol o Perfil
      y pinta una pantalla virtual al aire, en la cual podrá ver
      las opciones de permisos a asignar o quitar-->
<script type="text/javascript">
      $(document).on('ready',function(){
            rol_id = null;
            /**
             * Esta Parte de select_all y deselect_all no esta implementada
             * Se deja para su implementación, es fácil solo con un ciclo for
             * por ejemplo llama al metodo de abajo y ejecutar, esta puede ser una
             * opción, tiene muchas más.
             */
            $('#select-all').click(function(){
                  $('#select-permisos').multiSelect('select_all');
                  return false;
            });
            $('#deselect-all').click(function(){
                  $('#select-permisos').multiSelect('deselect_all');
                  return false;
            });

            $('#select-permisos').multiSelect({
                  selectableHeader: "<div class='custom-header'>Permisos no asignados</div>",
                  selectionHeader: "<div class='custom-header'>Permisos asignados</div>",
                  selectableFooter: "<div class='custom-footer'>Permisos no asignados</div>",
                  selectionFooter: "<div class='custom-footer'>Permisos asignados</div>",
                  afterSelect:function(value){//enviamos al servidor el id del permiso seleccionado
                        $.ajax({
                              url : '{{ URL::to("admin2/roles/asignar") }}',
                              type : 'GET',
                              dataType: 'json',
                              data : {permission_id: value[0], role_id: rol_id}
                        }).done(function(data){
                              console.log(data);
                        });
                  },
                  afterDeselect:function(value){//enviamos al servidor el id del permiso seleccionado
                        $.ajax({
                              url : '{{ URL::to("admin2/roles/desasignar") }}',
                              type : 'GET',
                              dataType: 'json',
                              data : {permission_id: value[0], role_id: rol_id}
                        }).done(function(data){
                              console.log(data);
                        });
                  }
            });
            $('.get-permisos').click(function(){
                  rol_id = $(this).attr('rol_id');
                  $.ajax({
                        url : '{{ url("admin2/roles") }}',
                        type : 'GET',
                        dataType: 'json',
                        data : {id: rol_id},
                  }).done(function(data){
                        $.each(data.permisosAsignados ,function(index, value){
                              $('#select-permisos option[value="'+value.id+'"]').attr('selected', true);
                        });
                        $('#select-permisos').multiSelect('refresh');
                  });
            });
      });
</script>