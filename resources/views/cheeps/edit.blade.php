<x-layout>
    <x-slot:title>
        Edit Cheep
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Cheep</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form action="/cheeps/{{ $cheep->id }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea name="message" rows="4"
                            class="textarea textarea-bordered w-full resize-none @error('message') text-error @enderror" required
                            maxlength="255">{{ old('message', $cheep->message) }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Cheep
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
