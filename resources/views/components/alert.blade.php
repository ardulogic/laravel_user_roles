<!-- /resources/views/components/alert.blade.php -->

<div class="alert alert-danger">
    @isset ($title)
        <div class="alert-title">{{ $title }}</div>
    @endisset
    @isset ($message)
        <div class="alert-message">{{ $message }}</div>
    @endisset
</div>

