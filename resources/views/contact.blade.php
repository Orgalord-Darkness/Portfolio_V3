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
        <a href="#projets" class="hover:text-blue-600 transition">Projets</a>
        <a href="#parcours" class="hover:text-blue-600 transition">Parcours</a>
        <a href="#certifications" class="hover:text-blue-600 transition">Certifications</a>
        <a href="#contact" class="hover:text-blue-600 transition">Contact</a>
    </nav>
</aside>

    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Formulaire de Contact</h2>

        <!-- Formulaire de Contact -->
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                
                <!-- Nom -->
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nom')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prénom -->
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('prenom')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('telephone')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Société -->
                <div>
                    <label for="societe" class="block text-sm font-medium text-gray-700">Société</label>
                    <input type="text" name="societe" id="societe" value="{{ old('societe') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('societe')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
