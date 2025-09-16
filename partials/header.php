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
<body class="bg-gray-900 text-gray-200 flex flex-col min-h-screen">

    <!-- Header Section -->
    <header class="bg-gray-900/80 backdrop-blur-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php?p=home" class="text-2xl font-bold text-teal-400">Mara Central</a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="index.php?p=lessons" class="hover:text-teal-400 transition-colors">Lessons</a>
                <a href="index.php?p=projects" class="hover:text-teal-400 transition-colors">Projects</a>
                <a href="#" class="hover:text-teal-400 transition-colors">About</a>
                <a href="#" class="hover:text-teal-400 transition-colors">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                 <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors">Login / Sign Up</a>
            </div>
        </nav>
    </header>
