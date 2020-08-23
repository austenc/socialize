<div class="socialize">
    <div class="socialize-container layout-{{ $layout ?? 'inline space-x-2' }}">

        {{-- Twitter --}}
        @if ($twitter_enabled ?? false)
            <a class="socialize-btn text-white bg-social-twitter" href="{{ $intent_twitter }}" target="_blank">
                <span class="transition-all hidden group-hover:inline-block duration-300">Twitter</span>
                @include('socialize::icons.twitter')
            </a>
        @endif

        {{-- Facebook --}}
        @if ($facebook_enabled ?? false)
            <a class="socialize-btn text-white bg-social-facebook" href="{{ $intent_facebook }}" target="_blank">
                @include('socialize::icons.facebook')
            </a>
        @endif

        {{-- Pinterest (WIP) --}}
        {{-- @if ($pinterest_enabled ?? false)
            <a class="socialize-btn text-white bg-social-pinterest" href="http://pinterest.com/pin/create/button/?url={{ urlencode(url('/')) }}" target="_blank">
                @include('socialize::icons.pinterest')
            </a>
        @endif --}}

        {{-- Email --}}
        @if ($email_enabled ?? false)
            <a class="socialize-btn text-white bg-gray-900" href="mailto:?&subject={{ urlencode($email_subject) }}&body={{ urlencode($email_text) }}" target="_blank">
                @include('socialize::icons.email')
            </a>
        @endif
    </div>
</div>