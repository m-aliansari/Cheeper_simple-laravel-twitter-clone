<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Latest Cheeps</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/cheeps">
                    @csrf
                    <div class="form-control w-full">
                        <textarea name="message" placeholder="Cheep away!" rows="4"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror" maxlength="255"
                            required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4 flex items-centre justify-end">
                        <button type="submit" class="btn btn-primary btn-sm">Cheep</button>
                    </div>
                </form>
            </div>
        </div>

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
