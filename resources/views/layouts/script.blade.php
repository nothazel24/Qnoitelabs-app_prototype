<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('js/animation.js') }}"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/flasher.js') }}"></script>

{{-- Start of Tawk.to Script --}}
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/68ccc73bc2adbe1921d6f6c4/1j5fv100f';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();

    // DATA USER
    Tawk_API.onChatStarted = function() {
        @if (Auth::check())
            Tawk_API.setAttributes({
                'name': '{{ Auth::user()->name ?? '' }}',
                'email': '{{ Auth::user()->email ?? '' }}',
                'phone': '{{ Auth::user()->phone ?? '' }}',
                'instagram': '{{ Auth::user()->instagram ?? '' }}'
            }, function(error) {});
        @endif
    };
</script>

@stack('scripts')
