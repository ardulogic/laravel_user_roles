<div class="form-container {{ $class ?? '' }} {{ $errors ? 'has-errors' : '' }}">
    @isset($title)
        <div class="form-title">{{ $title }}</div>
    @endisset

    @isset($message_top)
        <div class="form-message top">{{ $message_top }}</div>
    @endisset

    {!! Form::open(['action' => $action, 'method' => $method]) !!}

    @foreach ($fields as $name => $field)
        <div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
            @isset($field['label'])
                {{ Form::label('title', $field['label']) }}
            @endisset

            @switch ($field['type'])
                @case('input')
                {{ Form::text($name, $field['value'], $field['attr']) }}
                @break

                @case('password')
                {{ Form::input('password', $name, $field['value'], $field['attr']) }}
                @break

                @case('hidden')
                {{ Form::input('hidden', $name, $field['value']) }}
                @break

                @case('select')
                {!! Form::select($name, $field['options'], $field['value'] ?? null, $field['attr']) !!}
                @break

                @case('checkbox')
                {!! Form::checkbox($name, $field['value'], false, $field['attr']) !!}
                @break

                @case('button')
                {{ Form::button($field['title'], ['type' => 'submit', $field['attr']] ) }}
                @break
            @endswitch

            @if ($errors->has($name))
                <strong>{{ $errors->first($field['name']) }}</strong>
            @endif

        </div>
    @endforeach
    {!! Form::close() !!}
    @isset($message_bottom)
        <div class="form-message bottom">{{ $message_bottom }}</div>
    @endisset
</div>
