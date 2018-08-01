<div class="form-group">
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
           <li class="text-dark">{{ $error }}</li>
       @endforeach
    </ul>
    @endif
</div>