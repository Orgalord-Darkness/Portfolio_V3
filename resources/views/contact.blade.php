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
        <a href="/app" class="hover:text-blue-600 transition">Accueil</a>
        <a href="https://github.com/Orgalord-Darkness" class="hover:text-blue-600 transition">Github</a>
        <a href="/storage/fichiers/RGPD.pdf" class="hover:text-blue-600 transition" download="">RGPD<i class="fa-solid fa-upload"></i></a>
        <a href="/storage/fichiers/mentionslegales.pdf" class="hover:text-blue-600 transition" download="">Mentions légales<i class="fa-solid fa-upload"></i></a>
        <a href="https://www.figma.com/design/MK203PiQbB21mMhl1cq9P6/PortfolioV3?node-id=0-1&p=f&t=kM3vBuKExhrk56FG-0" class="hover:text-blue-600 transition">Maquette figma</a>
        <a href="/contact" class="hover:text-blue-600 transition">Contact</a>
    </nav>
</aside>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold w-full text-center text-gray-800 mb-6">Formulaire de Contact</h2>
        @if(session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-500 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-100 border border-red-500 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulaire de Contact -->
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    @error('nom')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prénom -->
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    @error('prenom')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Société -->
                <div>
                    <label for="societe" class="block text-sm font-medium text-gray-700">Société</label>
                    <input type="text" name="societe" id="societe" value="{{ old('societe') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    @error('societe')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.getElementById("toggle-sidebar");
        const sidebar = document.getElementById("sidebar");

        toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("translate-x-[-100%]");
        });
    });
</script>

</html>
