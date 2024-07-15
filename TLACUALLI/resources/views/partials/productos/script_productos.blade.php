{{-- Script para el corazón --}}
<script>
    function toggleLike(element) {
        var heartIcon = element.querySelector('.bi-heart');
        if (heartIcon.classList.contains('bi-heart-fill')) {
            heartIcon.classList.remove('bi-heart-fill');
            heartIcon.classList.add('bi-heart');
        } else {
            heartIcon.classList.remove('bi-heart');
            heartIcon.classList.add('bi-heart-fill');
        }
    }
</script>
