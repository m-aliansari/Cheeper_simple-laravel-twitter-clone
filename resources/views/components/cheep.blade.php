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
            <div class="min-w-0">
                <div class="flex items-center space-x-1 gap-1">
                    <span class="text-sm font-semibold">
                        {{ $cheep->user?->name ?? 'Anonymous' }}
                    </span>
                    <span class="text-base-content/60">.</span>
                    <span class="text-sm text-base-content/60">{{ $cheep->created_at->diffForHumans() }}</span>
                </div>

                <p class="mt-1">
                    {{ $cheep->message }}
                </p>
            </div>
        </div>
    </div>
</div>
