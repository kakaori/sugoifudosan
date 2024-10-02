@include('layouts.header')

<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-xl px-4 md:px-8">
    <!-- text - start -->
    <div class="">
      <h2 class="mb-4 text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">収益物件を検索</h2>
    </div>
    <!-- text - end -->

    <div class="grid gap-4 md:gap-6 xl:gap-8">
      <!-- article - start -->
      @foreach ($properties as $property)
      <div>
        <a href="{{ route('properties.show', $property) }}" class="flex flex-col items-center overflow-hidden rounded-lg border md:flex-row">
            <div class="group relative block h-96 w-full shrink-0 self-start overflow-hidden bg-gray-100 md:h-full md:w-96 lg:h-96">
                <img src="{{ asset('images/' .$property->id . '.png') }}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            </div>

            <div class="flex flex-col gap-2 p-4 lg:p-6">
                <span class="text-sm text-gray-400">{{ $property->property_type }}</span>

                <h2 class="mb-4 text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">
                    {{ $property->property_name }}
                </h2>

                <div class="flex flex-col py-2 md:py-4">
                    <div class="text-sm font-semibold sm:text-base">販売価格</div>
                    <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ number_format($property->sale_price / 10000) }}万円</div>
                </div>
            </div>
        </a>
      </div>
      @endforeach
      <!-- article - end -->
    </div>
  </div>
</div>

@include('layouts.footer')