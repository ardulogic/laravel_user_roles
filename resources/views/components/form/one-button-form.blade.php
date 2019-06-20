{!! Form::open(['method'  => $method, 'action' => $action, 'class' => 'd-inline']) !!}

    @isset ($fields)
        @foreach ($fields as $name => $field)
            {{ Form::input('hidden', $name, $field['value']) }}
        @endforeach
    @endisset

    {{ Form::button($title ?? null, ['type' => 'submit'] + $attr ?? []) }}

{!! Form::close() !!}
