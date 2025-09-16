<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mara Central - Your Modern Coding Companion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

    <!-- Header Section -->
    <header class="bg-gray-900/80 backdrop-blur-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-teal-400">Mara Central</a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="hover:text-teal-400 transition-colors">Lessons</a>
                <a href="#" class="hover:text-teal-400 transition-colors">Projects</a>
                <a href="#" class="hover:text-teal-400 transition-colors">About</a>
                <a href="#" class="hover:text-teal-400 transition-colors">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                 <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors">Login / Sign Up</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="py-20 md:py-32 bg-gray-900">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">Code with Clarity and Confidence.</h1>
                <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-8">Your modern resource for practical coding lessons, interactive projects, and a community of builders. Let's create something amazing.</p>
                <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-bold text-lg px-8 py-4 rounded-lg transition-transform transform hover:scale-105 inline-block">Explore Lessons</a>
            </div>
        </section>

        <!-- Features / What We Offer Section -->
        <section class="py-16 bg-gray-800">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-white mb-12">What You'll Find Inside</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature 1: Lessons -->
                    <div class="bg-gray-900 p-8 rounded-xl shadow-lg text-center transform hover:-translate-y-2 transition-transform">
                        <div class="text-teal-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Curated Lessons</h3>
                        <p class="text-gray-400">Step-by-step tutorials in PHP, JavaScript, and more, designed to be practical and easy to follow.</p>
                    </div>
                    <!-- Feature 2: Projects -->
                    <div class="bg-gray-900 p-8 rounded-xl shadow-lg text-center transform hover:-translate-y-2 transition-transform">
                        <div class="text-teal-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Interactive Labs</h3>
                        <p class="text-gray-400">Apply what you've learned with hands-on coding challenges and mini-applications you can build yourself.</p>
                    </div>
                    <!-- Feature 3: Snippets -->
                    <div class="bg-gray-900 p-8 rounded-xl shadow-lg text-center transform hover:-translate-y-2 transition-transform">
                        <div class="text-teal-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v1h-14v-1zM5 8h14v10a2 2 0 01-2 2H7a2 2 0 01-2-2V8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Personal Snippet Library</h3>
                        <p class="text-gray-400">Sign up to save your favorite code snippets, track lesson progress, and build your personal knowledge base.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Lessons Section -->
        <section class="py-16 bg-gray-900">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-white mb-12">Dive Into Our Latest Lessons</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Lesson Card 1 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg group">
                        <img src="https://placehold.co/600x400/1a202c/4fd1c5?text=PHP+Basics" alt="PHP Lesson" class="w-full h-48 object-cover group-hover:opacity-80 transition-opacity">
                        <div class="p-6">
                            <span class="text-sm text-teal-400 font-semibold">PHP</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3">Mastering Associative Arrays</h3>
                            <p class="text-gray-400 mb-4">Learn the power of key-value pairs in PHP for organizing complex data.</p>
                            <a href="#" class="font-semibold text-teal-500 hover:text-teal-400">Start Learning &rarr;</a>
                        </div>
                    </div>
                    <!-- Lesson Card 2 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg group">
                        <img src="https://placehold.co/600x400/1a202c/4fd1c5?text=JavaScript" alt="JavaScript Lesson" class="w-full h-48 object-cover group-hover:opacity-80 transition-opacity">
                        <div class="p-6">
                            <span class="text-sm text-teal-400 font-semibold">JavaScript</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3">Building a To-Do List App</h3>
                            <p class="text-gray-400 mb-4">A step-by-step guide to creating a dynamic to-do list with vanilla JavaScript.</p>
                            <a href="#" class="font-semibold text-teal-500 hover:text-teal-400">Start Building &rarr;</a>
                        </div>
                    </div>
                    <!-- Lesson Card 3 -->
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg group">
                        <img src="https://placehold.co/600x400/1a202c/4fd1c5?text=CSS" alt="CSS Lesson" class="w-full h-48 object-cover group-hover:opacity-80 transition-opacity">
                        <div class="p-6">
                            <span class="text-sm text-teal-400 font-semibold">HTML & CSS</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3">The Holy Grail Layout with Flexbox</h3>
                            <p class="text-gray-400 mb-4">Unlock the secrets to this classic, responsive layout using modern CSS techniques.</p>
                            <a href="#" class="font-semibold text-teal-500 hover:text-teal-400">Start Styling &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-800 border-t border-gray-700">
        <div class="container mx-auto px-6 py-8 text-center text-gray-400">
            <p>&copy; 2025 Mara Central. All Rights Reserved.</p>
            <p class="text-sm">Designed with love by Chris and Emma.</p>
        </div>
    </footer>

</body>
</html>
