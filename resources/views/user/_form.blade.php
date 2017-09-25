<!-- Name Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="form-group @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Roles') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('outlets', 'Outlet') !!}
    <select class="form-control" name="outlets">
        <option value="">--Select Outlet--</option>
        @foreach($outlet as $out)
        <option value="{{ $out->id }}">{{ $out->out_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('counter', 'Counter') !!}
    <select class="form-control" name="counter">
        <option value="">--Select Counter No.--</option>
       <option value="One">One</option>
       <option value="Two">Two</option>
       <option value="Three">Three</option>
       <option value="Four">Four</option>
       <option value="Five">Five</option>
       <option value="Six">Six</option>
       <option value="Seven">Seven</option>
       <option value="Eight">Eight</option>
       <option value="Nine">Nine</option>
       <option value="Ten">Ten</option>
    </select>
</div>

<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif