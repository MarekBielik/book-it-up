@if (count($errors) > 0)
        <!-- Form Error List -->
<div class="alert alert-danger">
    <strong>Do not underestimate the power of the Dark Side.</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif