<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Projets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #carousel {
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            overflow-x: auto;
        }
        .snap-item {
            scroll-snap-align: center;
            flex: 0 0 100%;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center pt-28 pb-10 space-y-6 relative">

    <div class=" w-full">
    <!-- Titre au-dessus du carousel -->
    <div class="mx-auto w-1/2 border-2 border-blue-700 bg-blue-300 px-8 py-3 rounded shadow text-blue-900 text-2xl font-semibold">
        <h1 class="text-center">Projets personnels encadrés</h1>
    </div>

    <!-- Carousel wrapper -->
    <div class="relative w-full" id="carousel-1">
    <div class="flex overflow-x-auto snap-x snap-mandatory space-x-6 h-screen w-screen" id="carousel-inner">
    @foreach($projets as $index => $projet)
        <div class="snap-start bg-[#e6f0ff] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full">
            
            <!-- Partie Vignette (demi-cadre) -->
            <div class="w-full h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                @foreach($vignettes as $vignette)
                    @if($projet->id_vignette == $vignette->id)
                        <img src="{{ $vignette->chemin }}" alt="Vignette du projet"
                            class="object-contain w-full h-full">
                    @endif
                @endforeach
            </div>

            <!-- Partie Description et autres infos (demi-cadre) -->
            <div class="w-1/2 flex flex-col justify-between ">
                <!-- Titre -->
                <h2 class="text-2xl font-bold text-[#1e3a8a] text-center">{{ $projet->nom }}</h2>

                <!-- Description -->
                <div class="text-sm md:text-base text-gray-800 space-y-2 max-w-3xl">
                    <p><span class="font-semibold">Description :</span> {{ $projet->description }}</p>
                    <p><span class="font-semibold">Responsable :</span> {{ $projet->chef }}</p>
                    <div class="flex items-start gap-2 flex-wrap">
                        <span class="font-semibold">Stack :</span>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($projets_has_apprentissages as $row)
                                @if($row->id_projet == $projet->id)
                                    @foreach($apprentissages as $apprentissage)
                                        @if($row->id_apprentissage == $apprentissage->id)
                                            <img src="{{ $apprentissage->vignette->chemin }}" alt="Apprentissage"
                                                 class="h-20 w-20 object-contain rounded">
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <p><span class="font-semibold">Github :</span> {{ $projet->github ?? 'Pas de github' }}</p>
                    <p><span class="font-semibold">Durée :</span> {{ $projet->duree ?? '50' }} heures</p>
                    <p><span class="font-semibold">Bilan :</span> {{ $projet->bilan ?? "L'ensemble des fonctionnalités est traité, c’est du bon travail." }}</p>
                </div>

                <!-- Bouton -->
                <a href="#" class="bg-[#1e3a8a] w-1/3 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Voir la documentation
                </a>


            </div>
        </div>
    @endforeach
</div>

    </div>

    <!-- Pagination contrôlée -->
    <div class="flex items-center gap-2 justify-center mt-4" id="pagination-1">
        @for ($i = 0; $i < count($projets); $i++)
            <button class="w-3 h-3 rounded-full bg-blue-900 transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-1">1/{{ count($projets) }}</p>
    </div>
</div>

<div class="w-full">
    <!-- Titre au-dessus du carousel -->
    <div class="mx-auto w-1/2 border-2 border-red-700 bg-red-300 px-8 py-3 rounded shadow text-red-900 text-2xl font-semibold">
        <h1 class="text-center">Missions de stages</h1>
    </div>

    <!-- Carousel wrapper pour projets MS -->
    <div class="relative w-full" id="carousel-2">
        <div class="flex overflow-x-auto snap-x snap-mandatory space-x-6 h-screen w-screen" id="carousel-inner-2">
            @foreach($ms as $index => $projet)
                <div class="snap-start bg-[#ffe6e6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full">
                    
                    <!-- Vignette -->
                    <div class="w-full h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                        @foreach($vignettes as $vignette)
                            @if($projet->id_vignette == $vignette->id)
                                <img src="{{ $vignette->chemin }}" alt="Vignette du projet"
                                     class="object-contain max-h-full w-auto">
                            @endif
                        @endforeach
                    </div>

                    <!-- Description -->
                    <div class="w-1/2 flex flex-col justify-between h-full">
                        <h2 class="text-2xl font-bold text-[#b30000] text-center">{{ $projet->nom }}</h2>
                        <div class="text-sm md:text-base text-gray-800 space-y-2 max-w-3xl">
                            <p><span class="font-semibold">Description :</span> {{ $projet->description }}</p>
                            <p><span class="font-semibold">Responsable :</span> {{ $projet->chef }}</p>
                            <div class="flex items-start gap-2 flex-wrap">
                                <span class="font-semibold">Stack :</span>
                                <div class="flex gap-2 flex-wrap">
                                    @foreach($projets_has_apprentissages as $row)
                                        @if($row->id_projet == $projet->id)
                                            @foreach($apprentissages as $apprentissage)
                                                @if($row->id_apprentissage == $apprentissage->id)
                                                    <img src="{{ $apprentissage->vignette->chemin }}" alt="Apprentissage"
                                                         class="h-20 w-20 object-contain rounded">
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <p><span class="font-semibold">Github :</span> {{ $projet->github ?? 'Pas de github' }}</p>
                            <p><span class="font-semibold">Durée :</span> {{ $projet->duree ?? '50' }} heures</p>
                            <p><span class="font-semibold">Bilan :</span> {{ $projet->bilan ?? "L'ensemble des fonctionnalités est traité, c’est du bon travail." }}</p>
                        </div>
                        <a href="#" class="bg-[#b30000] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition">
                            Voir la documentation
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination carousel-2 -->
    <div class="flex items-center gap-2 justify-center mt-4" id="pagination-2">
        @for ($i = 0; $i < count($ms); $i++)
            <button class="w-3 h-3 rounded-full transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-2">1/{{ count($ms) }}</p>
    </div>
</div>



<!-- Projets personnels -->
<div class="w-full">
    <div class="mx-auto w-1/2 border-2 border-green-700 bg-green-300 px-8 py-3 rounded shadow text-green-900 text-2xl font-semibold">
        <h1 class="text-center">Projets personnels</h1>
    </div>

    <!-- Carousel wrapper pour projets personnels -->
    <div class="relative w-full" id="carousel-3">
        <div class="flex overflow-x-auto snap-x snap-mandatory space-x-6 h-screen w-screen" id="carousel-inner-3">
            @foreach($pp as $index => $projet)
                <div class="snap-start bg-[#e6f9e6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full">
                    
                    <!-- Vignette -->
                    <div class="w-full h-full bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                        @foreach($vignettes as $vignette)
                            @if($projet->id_vignette == $vignette->id)
                                <img src="{{ $vignette->chemin }}" alt="Vignette du projet"
                                     class="object-contain max-h-full w-auto">
                            @endif
                        @endforeach
                    </div>

                    <!-- Description -->
                    <div class="w-1/2 flex flex-col justify-between h-full">
                        <h2 class="text-2xl font-bold text-[#2f6e4d] text-center">{{ $projet->nom }}</h2>
                        <div class="text-sm md:text-base text-gray-800 space-y-2 max-w-3xl">
                            <p><span class="font-semibold">Description :</span> {{ $projet->description }}</p>
                            <p><span class="font-semibold">Responsable :</span> {{ $projet->chef }}</p>
                            <div class="flex items-start gap-2 flex-wrap">
                                <span class="font-semibold">Stack :</span>
                                <div class="flex gap-2 flex-wrap">
                                    @foreach($projets_has_apprentissages as $row)
                                        @if($row->id_projet == $projet->id)
                                            @foreach($apprentissages as $apprentissage)
                                                @if($row->id_apprentissage == $apprentissage->id)
                                                    <img src="{{ $apprentissage->vignette->chemin }}" alt="Apprentissage"
                                                         class="h-20 w-20 object-contain rounded">
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <p><span class="font-semibold">Github :</span> {{ $projet->github ?? 'Pas de github' }}</p>
                            <p><span class="font-semibold">Durée :</span> {{ $projet->duree ?? '50' }} heures</p>
                            <p><span class="font-semibold">Bilan :</span> {{ $projet->bilan ?? "L'ensemble des fonctionnalités est traité, c’est du bon travail." }}</p>
                        </div>
                        <a href="#" class="bg-[#2f6e4d] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                            Voir la documentation
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination carousel-3 -->
    <div class="flex items-center gap-2 justify-center mt-4" id="pagination-3">
        @for ($i = 0; $i < count($pp); $i++)
            <button class="w-3 h-3 rounded-full bg-green-900 transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-3">1/{{ count($pp) }}</p>
    </div>
</div>

<script>
    // Init carrousels avec pagination
    document.querySelectorAll('[id^="carousel-"]').forEach((carousel) => {
        const idSuffix = carousel.id.split('-')[1]; // "2", "3"
        const items = carousel.querySelectorAll('.snap-start');
        const pagination = document.getElementById(`pagination-${idSuffix}`);
        if (!pagination) return;

        const dots = pagination.querySelectorAll('.dot');
        const pageCount = document.getElementById(`page-count-${idSuffix}`);

        dots.forEach((dot, i) => {
            dot.classList.add('bg-gray-300');
            dot.addEventListener('click', () => {
                items[i].scrollIntoView({ behavior: 'smooth', inline: 'center' });
                updatePagination(i);
            });
        });

        function updatePagination(activeIndex) {
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-[#b30000]', i === activeIndex);
                dot.classList.toggle('bg-gray-300', i !== activeIndex);
            });
            if (pageCount) {
                pageCount.textContent = `${activeIndex + 1}/${items.length}`;
            }
        }

        updatePagination(0);
    });
</script>

</body>
</html>
