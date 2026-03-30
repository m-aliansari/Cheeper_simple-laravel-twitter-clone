@props(['cheep'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if ($cheep->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($cheep->user->email) }}"
                            alt="{{ $cheep->user->name }}'s avatar" class="rounded-full">
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/a2376f72-c2c7-4446-8d43-d719f9c4ff44?vibe=stealth"
                            alt="Anonymous User" class="rounded-full">
                    </div>
                </div>
            @endif
            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center space-x-1 gap-1">
                        <span class="text-sm font-semibold">
                            {{ $cheep->user?->name ?? 'Anonymous' }}
                        </span>
                        <span class="text-base-content/60">.</span>
                        <span class="text-sm text-base-content/60">{{ $cheep->created_at->diffForHumans() }}</span>
                        @if ($cheep->updated_at->gt($cheep->created_at->addSeconds(5)))
                            <span class="text-base-content/60">.</span>
                            <span class="text-base-content/60 text-sm italic">edited</span>
                        @endif
                    </div>

                    @can('update', $cheep)
                        <div class="flex gp-1">
                            <a href="/cheeps/{{ $cheep->id }}/edit" class="btn btn-ghost btn-xs">
                                Edit
                            </a>
                            <form action="/cheeps/{{ $cheep->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-xs text-error"
                                    onclick="return confirm('Are you sure you want to delete this cheep?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
                <p class="mt-1">
                    {{ $cheep->message }}
                </p>
            </div>
        </div>
    </div>
</div>
