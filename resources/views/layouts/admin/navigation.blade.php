<div class="flex">
    {{-- Logo --}}
    <div class="shrink-0 flex items-center">
        <a href="">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    {{-- Navigation Links --}}
    <div class="shrink-0 flex items-center dark:text-gray-200 px-4">
        {{ config('app.name', 'Laravel') }}
    </div>
</div>

<div class="flex items-center dark:text-gray-200">
    ようこそ {{ Auth::guard('admin')->user()->name }}さん
</div>

{{-- Log Out --}}
<div class="flex items-center dark:text-gray-200">
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <x-dropdown-link :href="route('admin.logout')"
                         onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</div>
