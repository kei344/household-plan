<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        @if($user->upload_image === null)
            <img src="{{ asset('/storage/uploads/no_image.png') }}" width="300" height="300" alt="No Image">
        @else
            <img src="{{ asset('/storage/'.$user->upload_image->file_path) }}" width="300" height="300" alt="No Image">
        @endif
    </div>
</div>