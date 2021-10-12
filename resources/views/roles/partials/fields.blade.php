<div class="form-group">
    <table class="table table-bordered" id="MyTable">
        <tr>
            <td>
                {!! Form::label('slug', 'Nombre Perfil', ['for' => 'slug'] ) !!}
                {!! Form::text('slug', null , ['class' => 'form-control',
                 'id' => 'name',
                 'placeholder' => 'Ejemplo admin' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('description', 'Descripción del Perfil', ['for' => 'description'] ) !!}
                {!! Form::text('description', null , ['class' => 'form-control',
                 'id' => 'description',
                  'placeholder' => 'Ejemplo Administrador del Sistema' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('level', 'Nivel del Perfil', ['for' => 'level'] ) !!}
                {!! Form::text('level', null , ['class' => 'form-control', 'type' => 'number',
                 'min' => 1, 'max' => 7, 'id' => 'level',
                  'placeholder' => 'Ejemplo 1' ]  ) !!}
            </td>
        </tr>
    </table>
</div>