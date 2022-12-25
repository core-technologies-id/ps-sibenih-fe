@if (Session::has('message_error'))
    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
        <div class="alert-text">{{ Session::get('message_error') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
@if (Session::has('message_success'))
    <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
        <div class="alert-text">{{ Session::get('message_success') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@elseif(Session::has('message_array_error'))
    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
        <div class="alert-text">
            @foreach (Session::get('message_array_error') as $key => $value)
                {{ sprintf('%s %s', $key, $value) }} &hellip;
            @endforeach
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@elseif($errors->any())
    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
        <div class="alert-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
