@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if($user->upload_image === null)
                    <img class="mr-2" src="{{ asset('/storage/uploads/no_image.png') }}" width="50" height="50" alt="No Image">
                @else
                    <img class="mr-2" src="{{ asset('/storage/'.$user->upload_image->file_path) }}" width="50" height="50" alt="No Image">
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'ユーザーページ', ['id' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif