@php
    $locale = app()->getLocale();
@endphp

<div class="fi-dropdown-header-actions flex justify-between items-center px-3 py-2 gap-2">
    <form method="POST" action="{{ route('language.switch') }}">
        @csrf
        <input type="hidden" name="locale" value="ar">
        <div class="hover:bg-gray-50 rounded">
            <button type="submit"
                class="fi-dropdown-header-action rounded-full p-2 transition
                {{ $locale === 'ar' ? 'bg-primary-500/10 text-primary-600' : 'text-gray-500 hover:text-gray-700' }}"
                title="العربية">
                <img src="/images/icons/oman.png" alt="منتج" class="mx-auto" width="32px" />
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('language.switch') }}">
        @csrf
        <input type="hidden" name="locale" value="en">
        <div class="hover:bg-gray-50 rounded">
            <button type="submit"
                class="fi-dropdown-header-action rounded-full p-2 transition
                {{ $locale === 'en' ? 'bg-primary-500/10 text-primary-600' : 'text-gray-500 hover:text-gray-700' }}"
                title="English">
                <img src="/images/icons/united-kingdom.png" alt="منتج" class="mx-auto" width="32px" />
            </button>
        </div>
    </form>
</div>
