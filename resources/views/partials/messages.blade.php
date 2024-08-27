@if (session('success'))
<div class="message-container">
    <div class="alert alert-success alert-dismissible fade show">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@if (session('error'))
<div class="message-container">
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif