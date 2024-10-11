<div class="rounded p-2 pb-1 pt-2 text-light" style="background-color: #6381c675">
    <span class="small">{{ $post->ip_address }} - {{ $post->created_at->format("d/m/Y H:i:s") }}</span>
    <br>
    <p class="mt-1 mb-1">
        {{ $post->texto }}
    </p>
    <div class="d-flex align-items-center">
        <form action="{{url('/post/' . $post->id . '/like')}}" method="POST">
            @csrf
            <button type="submit" class="btn text-light">
                <i class="bi bi-heart text-danger me-2"></i>
                <span>{{ $post->likes }}</span>
            </button>
        </form>
    </div>
</div>