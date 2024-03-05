<div class="card h-100 border-0">
    <div class="card-body text-center"> <!-- Centramos el contenido horizontalmente -->
        <img src="{{ $image }}" class="img-fluid mb-3" alt="{{ $alt }}" style="max-width: 315px;">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $description }}</p>
        <a href="{{ $route }}" class="btn btn-primary">Ver más</a>
    </div>
</div>
