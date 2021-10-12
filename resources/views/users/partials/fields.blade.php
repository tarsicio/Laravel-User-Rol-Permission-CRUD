<div class="form-group">
    <table class="table table-bordered" id="MyTable">
        <tr>
            <td>
                {!! Form::label('foto', 'Foto Usuario', ['for' => 'foto'] ) !!}
                {!! Form::file('foto', null , ['class' => 'form-control', 'id' => 'foto' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('name', 'Nombre usuario', ['for' => 'name'] ) !!}
                {!! Form::text('name', null , ['class' => 'form-control',
                 'id' => 'name',
                 'placeholder' => 'name...Eje carlos Garcia' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('login', 'Login', ['for' => 'login'] ) !!}
                {!! Form::text('login', null , ['class' => 'form-control',
                 'id' => 'login',
                  'placeholder' => 'Eje... Administrador' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('email', 'E-Mail', ['for' => 'email'] ) !!}
                {!! Form::email('email', null , ['class' => 'form-control',
                 'id' => 'mail',
                  'placeholder' => 'Email...Eje telecom.com.ve@gamil.com' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('password', 'Indique la Clave', ['for' => 'password'] ) !!}
                {!! Form::password('password', null , ['class' => 'form-control',
                 'id' => 'password',
                  'placeholder' => 'Password...Eje 123456' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('password_confirmation', 'Confirme Clave', ['for' => 'password'] ) !!}
                {!! Form::password('password_confirmation', null , ['class' => 'form-control',
                 'id' => 'password_confirmation',
                  'placeholder' => 'Password...Eje 123456' ]  ) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('role', 'Rol', ['for' => 'role']) !!}
                {!! Form::select('rol', $roles , null, array('class' => 'form-control')) !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('fechainicio', 'Fecha Inicio Cuenta Activa', ['for' => 'fechainicio'] ) !!}
                {!!Form::date('fechainicio', \Carbon\Carbon::now())!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('fechafin', 'Fecha Fin de Cuenta Activa', ['for' => 'fechafin'] ) !!}
                {!!Form::date('fechafin', \Carbon\Carbon::now()->addMonth(6))!!}
            </td>
        </tr>
    </table>
</div>