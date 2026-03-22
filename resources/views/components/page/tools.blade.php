@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .marqueeSwiper .swiper-wrapper {
        transition-timing-function: linear !important;
    }

    .marqueeSwiper .swiper-slide {
        width: auto;
    }

    .marqueeSwiper:hover .swiper-wrapper {
        animation-play-state: paused;
    }
</style>
@endpush

<section class="bg-gray-50 py-12 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Header -->
        <div class="text-center mb-10">

            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                Supported Tools
            </h2>
        </div>

        <!-- Swiper -->
        <div class="swiper marqueeSwiper">
            <div class="swiper-wrapper">

                @php
                $tools = [
                'Garuda', 'IPI', 'Crossref', 'ResearchGate',
                'Scholar', 'Turnitin', 'Scopus', 'ISSN', 'Sinta'
                ];
                @endphp

                @foreach($tools as $tool)
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow h-28 flex items-center justify-center">
                        <img src="{{ asset('images/tools/' . $tool . '.png') }}"
                            alt="{{ $tool }}"
                            class="h-full w-auto object-contain opacity-80 hover:opacity-100 transition-opacity duration-300"
                            loading="lazy"
                            onerror="this.style.display='none'">
                    </div>
                </div>
                @endforeach

                {{-- Duplicate for seamless loop --}}
                @foreach($tools as $tool)
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow h-28 flex items-center justify-center">
                        <img src="{{ asset('images/tools/' . $tool . '.png') }}"
                            alt="{{ $tool }}"
                            class="h-full w-auto object-contain opacity-80 hover:opacity-100 transition-opacity duration-300"
                            loading="lazy"
                            onerror="this.style.display='none'">
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const marquee = new Swiper(".marqueeSwiper", {
            loop: true,
            slidesPerView: "auto",
            spaceBetween: 24,
            speed: 4000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            freeMode: true,
            freeModeMomentum: false,
            grabCursor: false,
        });
    });
</script>
@endpush