<?php

use App\Models\Resume;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\StreamedResponse;

new class extends Component {
    public $resume;

    public function mount(): void
    {
        $this->resume = Resume::first();
    }

    public function downloadPdf(): StreamedResponse
    {
        $url = route('resume.print');

        // Génération du pdf
        $data = Browsershot::url($url)
            ->setNodeBinary('/home/pierre/.nvm/versions/node/v24.12.0/bin/node')
            ->setNpmBinary('/home/pierre/.nvm/versions/node/v24.12.0/bin/npm')
            ->emulateMedia('screen')
            ->format('A4')
            ->margins(0, 0, 0, 0)
            ->showBackground()
            ->waitUntilNetworkIdle()
            ->windowSize(1200, 1600)
            ->pdf();

        return response()->streamDownload(function () use ($data) {
            echo $data;
        }, 'cv-pierre-bultez.pdf');
    }
}; ?>

<div>
    @if($resume)
        <x-resume-content :resume="$resume"/>

    <!-- Bouton Export PDF -->
    <div class="fixed bottom-12 right-12 print:hidden" x-data="{ binary: '01010101' }">
        <button wire:click="downloadPdf"
                class="relative bg-terminal-pink/80 hover:bg-terminal-pink text-white px-8 py-4 rounded-md shadow-lg flex items-center gap-4 transition-all active:scale-95 group overflow-hidden cursor-pointer"
                wire:loading.class="animate-glitch shadow-[0_0_30px_rgba(249,38,114,0.8)] cursor-wait"
                @click="let timer = setInterval(() => { binary = Math.random().toString(2).substring(2, 10); }, 50)">

            <!-- Effet de Glow au Hover -->
            <div class="absolute inset-0 group-hover:bg-terminal-purple/20 blur-xl transition-opacity duration-300"></div>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 relative z-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>

            <!-- Texte Normal -->
            <span wire:loading.remove wire:target="downloadPdf" class="font-bold tracking-widest relative z-10 drop-shadow-sm">
                {downloadPdf [A4]}
            </span>

            <!-- Texte de Chargement Animé -->
            <div wire:loading wire:target="downloadPdf" class="flex flex-col items-start leading-none min-w-[100px] relative z-10">
                <span class="text-[10px] text-white/90 uppercase tracking-tighter font-bold">Compiling PDF...</span>
                <span class="font-mono text-xl font-bold text-terminal-green drop-shadow-[0_0_5px_rgba(102,217,239,0.8)]" x-text="binary"></span>
            </div>

            <!-- Effet de scanline terminal AGRESSIF & ANIME -->
            <div class="absolute inset-0 pointer-events-none z-20">
                <!-- Grille statique -->
                <div class="absolute inset-0 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.25)_50%),linear-gradient(90deg,rgba(255,0,0,0.06),rgba(0,255,0,0.02),rgba(0,0,255,0.06))] bg-[length:100%_4px,3px_100%] opacity-40"></div>
                <!-- Ligne de balayage animée -->
                <div class="absolute top-0 left-0 w-full h-8 bg-gradient-to-b from-transparent via-white/5 to-transparent animate-scanline"></div>
            </div>
        </button>
    </div>    @else
        <div class="text-terminal-pink italic">
            [ERROR] No resume data found in database. Please run seeders.
        </div>
    @endif
</div>
