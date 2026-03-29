<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($cheeps as $cheep)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $cheep->user?->name ?? 'Anonymous' }}
                        </div>
                        <div class="mt-1">{{ $cheep->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $cheep->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No cheeps yet. Be the first to cheep!</p>
        @endforelse
    </div>
</x-layout>
