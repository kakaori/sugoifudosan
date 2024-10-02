@include('layouts.header')

  <div class="bg-white">
    <div class="mx-auto max-w-screen-xl px-4 md:px-8">
      <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
        <div>
          <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
            <img src="{{ asset('images/' .$property->id . '.png') }}" loading="lazy" class="w-full object-center" />
          </div>
        </div>
  
        <div class="md:pt-8">
          <p class="font-bold text-indigo-500">{{ $property->property_type }}</p>
  
          <h1 class="mb-4 text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">{{ $property->property_name }}</h1>

            <div class="flex flex-col p-2 md:p-4">
                <div class="text-sm font-semibold sm:text-base">販売価格</div>
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ number_format($property->sale_price / 10000) }}万円</div>
            </div>
            @if($property->gross_yield)
            <div class="flex flex-col p-2 md:p-4">
                <div class="text-sm font-semibold sm:text-base">表面利回り</div>
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ $property->gross_yield }}%</div>
            </div>
            @endif
            @if($property->expected_annual_income)
            <div class="flex flex-col p-2 md:p-4">
                <div class="text-sm font-semibold sm:text-base">想定年間収入</div>
                <div class="text-xl font-bold text-indigo-500 sm:text-2xl md:text-3xl">{{ number_format($property->expected_annual_income / 10000) }}万円</div>
            </div>
            @endif
        </div>
      </div>

      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
            <div>
              <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $property->partner->name }}</h2>
              <p class="text-gray-600">お問い合わせは「すごい不動産に掲載されている物件を見た」とお伝えください。</p>
            </div>
      
            <a href="#" class="flex inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                資料請求する(無料)</a>
          </div>
        </div>
      </div>

      <h2 class="mb-2 text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4">{{ $property->property_name }}の物件詳細</h2>

      <table class="table-auto w-full text-left whitespace-no-wrap">
         <tr class="border-b border-t">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">物件種別</th>
            <td class="px-4 py-4">{{ $property->property_type }}</td>
          </tr>
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">物件名</th>
            <td class="px-4 py-4">{{ $property->property_name }}</td>
          </tr>
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">販売価格</th>
            <td class="px-4 py-4">{{ number_format($property->sale_price / 10000) }}万円</td>
          </tr>
          @if($property->gross_yield)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">表面利回り</th>
            <td class="px-4 py-4">{{ $property->gross_yield }}%</td>
          </tr>
          @endif
          @if($property->expected_annual_income)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">想定年間収入</th>
            <td class="px-4 py-4">{{ number_format($property->expected_annual_income / 10000) }}万円</td>
          </tr>
          @endif
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">所在地</th>
            <td class="px-4 py-4">{{ $property->location }}</td>
          </tr>
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">交通</th>
            <td class="px-4 py-4">{{ $property->transport_company }} {{ $property->transport_line }} {{ $property->line_station }}{{ $property->walk }}分</td>
          </tr>
          @if($property->occupied_area)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">占有面積</th>
            <td class="px-4 py-4">{{ $property->occupied_area }}㎡</td>
          </tr>
          @endif
          @if($property->building_structure)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">建物構造</th>
            <td class="px-4 py-4">{{ $property->building_structure }}</td>
          </tr>
          @endif
          @if($property->construction_date)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">築年月</th>
            <td class="px-4 py-4">{{ \Carbon\Carbon::parse($property->construction_date)->format('Y年n月') }}</td>
          </tr>
          @endif
          @if($property->floor)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">所在階</th>
            <td class="px-4 py-4">{{ $property->floor }}階</td>
          </tr>
          @endif
          @if($property->land_right)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">土地権利</th>
            <td class="px-4 py-4">{{ $property->land_right }}</td>
          </tr>
          @endif
          @if($property->building_area)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">建物面積</th>
            <td class="px-4 py-4">{{ $property->building_area }}㎡</td>
          </tr>
          @endif
          @if($property->land_area)
          <tr class="border-b">
            <th class="px-4 py-4 text-gray-900 bg-gray-100">土地面積</th>
            <td class="px-4 py-4">{{ $property->land_area }}㎡</td>
          </tr>
          @endif
      </table>

      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
            <div>
              <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">{{ $property->partner->name }}</h2>
              <p class="text-gray-600">お問い合わせは「すごい不動産に掲載されている物件を見た」とお伝えください。</p>
            </div>
      
            <a href="#" class="flex inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                資料請求する(無料)</a>
          </div>
        </div>
      </div>

    </div>
  </div>


@include('layouts.footer')