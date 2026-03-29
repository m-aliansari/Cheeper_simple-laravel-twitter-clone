<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Latest Cheeps</h1>

        <div class="space-y-4 mt-8">
            @forelse ($cheeps as $cheep)
                <x-cheep :cheep="$cheep" />
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <p class="mt-4 text-base-content/60">No cheeps yet. Be the first to cheep!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
