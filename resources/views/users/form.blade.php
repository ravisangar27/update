<div class="form-group {{ set_errorClass($errors, 'name') }}">
    <label for="name" class="col-sm-3 control-label required">User Name</label>
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
    </div>
</div>

<div class="form-group {{ set_errorClass($errors, 'email') }}">
    <label for="email" class="col-sm-3 control-label required">E-Mail</label>
    <div class="col-sm-9">
        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'info@gmail.com']) }}
    </div>
</div>

<div class="form-group {{ set_errorClass($errors, 'password') }}">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'min. 8']) }}
    </div>
</div>

<div class="form-group {{ set_errorClass($errors, 'password_confirmation') }}">
    <label for="password_confirmation" class="col-sm-3 control-label">Passwort Again</label>
    <div class="col-sm-9">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'min. 8']) }}
    </div>
</div>

<div class="form-group submit-row">
    <div class="col-sm-offset-3 col-sm-8">
        <button type="submit" class="btn btn-success">{{ $submitButtonText ?? 'Save' }}</button> oder
        @if (isset($user))
            {{ link_to_route('user.show', 'Cancel', $user) }}
        @else
            {{ link_to_route('user.index', 'Cancel') }}
        @endif
    </div>
</div>