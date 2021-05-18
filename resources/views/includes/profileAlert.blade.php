@if($dataProfiles == 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Isi data profile Anda</strong> <a href="{{ route('profile') }}"class="link-danger">disini</a>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif