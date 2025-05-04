<!-- resources/views/projets.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Projets</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Nos Projets</h1>

        <!-- Carousel -->
        <div class="relative">
            <div class="flex overflow-x-auto space-x-4 pb-4 scroll-smooth" id="carousel">
                @foreach ($projets as $projet)
                    <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 flex-shrink-0">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $projet->nom }}</h2>
                            <p class="text-gray-600 mb-3">{{ \Illuminate\Support\Str::limit($projet->description, 100) }}</p>
                            @foreach($vignettes as $vignette)
                                @if($projet->id_vignette == $vignette->id)
                                    <img src="{{ $vignette->chemin}}" style="width:50%">
                                @endif
                            @endforeach
                            @foreach($projets_has_apprentissages as $row)
                                @if($row->id_projet == $projet->id)
                                    @foreach($apprentissages as $apprentissage)
                                        @if($row->id_apprentissage == $apprentissage->id)
                                            <img src="{{ $apprentissage->vignette->chemin}}" style="width:10%">
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">En savoir plus</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Flèches de navigation -->
            <button class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700" id="prev">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full hover:bg-gray-700" id="next">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Carousel Script -->
    <script>
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        const carousel = document.getElementById('carousel');

        prev.addEventListener('click', () => {
            carousel.scrollBy({ left: -300, behavior: 'smooth' });
        });

        next.addEventListener('click', () => {
            carousel.scrollBy({ left: 300, behavior: 'smooth' });
        });
    </script>

</body>
</html>
