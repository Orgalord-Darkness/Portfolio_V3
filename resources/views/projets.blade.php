<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
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
<!-- SIDEBAR VERTICALE AVEC BOUTON FERMETURE -->
<!-- BOUTON TOGGLE TOUJOURS VISIBLE -->
<button id="toggle-sidebar"
    class="fixed top-4 left-4 z-50 bg-blue-700 text-white px-3 py-2 rounded-full shadow-lg hover:bg-blue-800 transition">
    ☰
</button>

<!-- SIDEBAR VERTICALE -->
<aside id="sidebar"
    class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg z-40 flex flex-col transition-transform duration-300">
    <!-- En-tête avec titre -->
    <div class="h-16 flex items-center justify-center border-b text-xl font-bold text-blue-700">
        MonPortfolio
    </div>

    <!-- Liens de navigation -->
    <nav class="flex flex-col px-6 py-4 space-y-4 text-gray-800 font-medium">
        <a href="#presentation" class="hover:text-blue-600 transition">Présentation</a>
        <a href="#projets" class="hover:text-blue-600 transition">Projets</a>
        <a href="#parcours" class="hover:text-blue-600 transition">Parcours</a>
        <a href="#certifications" class="hover:text-blue-600 transition">Certifications</a>
        <a href="#contact" class="hover:text-blue-600 transition">Contact</a>
    </nav>
</aside>



    <h1 class="text-center text-blue-900 text-5xl" id="presentation">Présentation</h1>
    <div class="relative h-screen flex items-center justify-center">
        <!-- Effet de traînée d'encre bleue -->
        <div class="absolute inset-0 flex items-center justify-center">
            <svg class="w-3/4 h-1/2 opacity-20" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,100 C200,200 600,0 800,100 L800,400 L0,400 Z" fill="#3b82f6"/>
            </svg>
        </div>

        <!-- Contenu principal -->
        <div class="relative z-10 flex bg-blue-100 rounded-xl shadow-lg overflow-hidden w-11/12 max-w-6xl border-4 border-blue-900">
            <!-- Photo -->
            <div class="w-1/2">
                <img src="{{ $avatar }}" alt="Présentation" class="object-cover object-center border-4 border-blue-100 h-full w-full rounded shadow-lg">
            </div>


            <!-- Texte -->
            <div class="w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-4xl font-extrabold text-blue-900 mb-4">Bienvenue sur mon portfolio</h2>
                <p class="text-blue-900 text-lg mb-4">
                    Je m'appelle <strong>Heddy Mameri</strong>, étudiant de 2e année de <strong>BTS SIO SLAM</strong> à l'institut Saint Vincent
                </p>
                <p class="text-blue-900">
                J’ai appris lors de mon parcours à être développeur Full Stack, j’ai réalisé différents projets dans plusieurs technologies tel que <strong>php</strong> scratch, <strong>C#</strong> , <strong>Symfony 7</strong>, <strong>Laravel 12</strong>. 
                Je souhaite faire arriver jusqu’au master en génie informatique spécialisé en Intelligence Artificielle en conservant mes compétences Full Stack afin de garder une certaine agilité. 
                </p>
            </div>
        </div>
    </div>



    <h1 class="text-center text-blue-900 text-5xl" id="projets">Projets</h1>
    <div class="h-screen">
    <!-- Titre au-dessus du carousel -->
    <div class="mx-auto w-1/2 border-4 border-blue-900 bg-blue-300 px-8 py-3 rounded shadow text-blue-900 text-2xl font-semibold">
        <h1 class="text-center">Projets Personnels Encadrés</h1>
    </div>

    <!-- Carousel wrapper pour projets MS -->
    <div class="relative w-full max-w-5xl" id="carousel-1">
        <div class="flex overflow-x-hidden snap-x snap-mandatory space-x-6" id="carousel-inner-2">
        @foreach($projets as $index => $projet)
            <div class="snap-start bg-[#e6f0ff] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full">
                
                <!-- Partie Vignette (demi-cadre) -->
                <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
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
                    <a href="#" class="bg-[#1e3a8a] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Voir la documentation
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    </div>

    <!-- Pagination contrôlée -->
    <div class="bg-[#e6f0ff] flex items-center gap-2 justify-center" id="pagination-1">
        @for ($i = 0; $i < count($projets); $i++)
            <button class="w-3 h-3 rounded-full bg-blue-900 transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-1">1/{{ count($projets) }}</p>
    </div>
</div>

<div class="h-screen">
    <!-- Titre au-dessus du carousel -->
    <div class="mx-auto w-1/2 border-4 border-red-900 bg-red-300 px-8 py-3 rounded shadow text-red-900 text-2xl font-semibold">
        <h1 class="text-center">Missions de stages</h1>
    </div>

    <!-- Carousel wrapper pour projets MS -->
    <div class="relative w-full max-w-5xl" id="carousel-2">
        <div class="flex overflow-x-hidden snap-x snap-mandatory space-x-6" id="carousel-inner-2">
            @foreach($ms as $index => $projet)
                <div class="snap-start bg-[#ffe6e6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full">
                    
                    <!-- Vignette -->
                    <div class="w-1/2 h-64 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
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
    <div class="flex items-center gap-2 justify-center bg-[#ffe6e6]" id="pagination-2">
        @for ($i = 0; $i < count($ms); $i++)
            <button class="w-3 h-3 rounded-full transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-2">1/{{ count($ms) }}</p>
    </div>
</div>



<!-- Projets personnels -->
<div class="h-screen">
    <div class="mx-auto w-1/2 border-4 border-green-900 bg-green-300 px-8 py-3 rounded shadow text-green-900 text-2xl font-semibold">
        <h1 class="text-center">Projets personnels</h1>
    </div>

    <!-- Carousel wrapper pour projets personnels -->
    <div class="relative w-full max-w-5xl" id="carousel-3">
        <div class="flex overflow-x-hidden snap-x snap-mandatory space-x-6" id="carousel-inner-3">
            @foreach($pp as $index => $projet)
                <div class="snap-start bg-[#e6f9e6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full">
                    
                    <!-- Vignette -->
                    <div class="w-1/2 h-64 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
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
                            <a href="{{ $projet->github }}"><span class="font-semibold">Github :</span> {{ $projet->github ?? 'Pas de github' }}</a>
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
    <div class="flex items-center gap-2 justify-center bg-[#e6f9e6]" id="pagination-3">
        @for ($i = 0; $i < count($pp); $i++)
            <button class="w-3 h-3 rounded-full bg-green-900 transition-all duration-300 dot" data-index="{{ $i }}"></button>
        @endfor
        <p class="text-gray-700 ml-4" id="page-count-3">1/{{ count($pp) }}</p>
    </div>
</div>

<h1 class="text-center text-blue-900 text-5xl" id="parcours">Mon parcours</h1>

<h1 class="text-center text-blue-900 text-5xl" id="certifications">Mes certifications</h1>

<h1 class="text-center text-blue-900 text-5xl" id="contact">Formulaire de contact</h1>
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
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-sidebar');

    let sidebarVisible = false; // Initialiser à false pour que le menu soit invisible par défaut

    // Ajouter la classe 'hidden' au sidebar par défaut
    sidebar.classList.add('hidden');

    toggleBtn.addEventListener('click', () => {
        sidebarVisible = !sidebarVisible;

        if (sidebarVisible) {
            sidebar.classList.remove('hidden');
            toggleBtn.textContent = '✕'; // Fermer
        } else {
            sidebar.classList.add('hidden');
            toggleBtn.textContent = '☰'; // Ouvrir
        }
    });

    // Initialise avec l’icône d'ouverture
    toggleBtn.textContent = '☰';
</script>



</body>
</html>
