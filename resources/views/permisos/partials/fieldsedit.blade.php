<div class="form-group">
    <table class="table table-bordered" id="MyTable">
        <tr>
            <td>
                {!! Form::label('slug', 'Nombre Permiso', ['for' => 'slug'] ) !!}
                {!! Form::text('slug', null , ['class' => 'form-control',
                 'id' => 'slug', 'readonly',
                 'placeholder' => 'Ejemplo: crear.usuario' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('description', 'Descripción', ['for' => 'description'] ) !!}
                {!! Form::text('description', null , ['class' => 'form-control',
                 'id' => 'description',
                  'placeholder' => 'Ejemplo: Permiso para crear usuario' ]  ) !!}
            </td>
        </tr>
    </table>
</div>