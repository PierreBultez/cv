<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV - Terminal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="terminal-window h-[85vh] flex flex-col">
        <!-- Barre de titre du terminal -->
        <div class="terminal-header justify-between">
            <div class="flex gap-2">
                <div class="terminal-dot bg-[#ff5f56]"></div>
                <div class="terminal-dot bg-[#ffbd2e]"></div>
                <div class="terminal-dot bg-[#27c93f]"></div>
            </div>
            <div class="text-terminal-gray text-xs">pierre-bultez-dev@terminal: ~/resume.blade.php</div>
            <div class="w-12"></div>
        </div>

        <!-- Corps du terminal -->
        <div class="terminal-body flex-1">

            <div class="flex items-center">
                <span class="prompt">$</span>
                <span class="type">loading</span>&nbsp;<span class="variable">resume</span>...
            </div>

            <div class="mt-4">
                <livewire:resume-viewer />
            </div>
        </div>
    </div>
</body>
</html>
