<div class="socialize">
    <div class="socialize-container layout-{{ $layout ?? 'inline space-x-2' }}">
        <a class="socialize-btn text-white bg-social-twitter" href="https://twitter.com/intent/tweet" target="_blank">
            <span class="transition-all hidden group-hover:inline-block duration-300">Twitter</span>
            @include('socialize::icons.twitter')
        </a>
        <a class="socialize-btn text-white bg-social-facebook" href="https://www.facebook.com/share.php?u=https://jerrys-everywhere.com" target="_blank">
            @include('socialize::icons.facebook')
        </a>
        {{-- <a class="socialize-btn text-white bg-social-instagram" href="#instagram" target="_blank">
            @include('socialize::icons.instagram')
        </a> --}}
        <a class="socialize-btn text-white bg-social-pinterest" href="#pinterest" target="_blank">
            @include('socialize::icons.pinterest')
        </a>
        <a class="socialize-btn text-white bg-gray-900" href="#email" target="_blank">
            @include('socialize::icons.email')
        </a>
    </div>
</div>