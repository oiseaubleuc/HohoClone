<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profielinformatie') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Werk uw profielinformatie en profielfoto bij.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Naam -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" class="mt-1 block w-full">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <!-- Locatie -->
        <div>
            <x-input-label for="location" :value="__('Locatie')" />
            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $user->location)" />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <!-- Profielfoto -->
        <div>
            <x-input-label for="profile_picture" :value="__('Profielfoto')" />
            <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" />
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="w-20 h-20 rounded-full mt-2">
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <!-- Opslaan -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
