@include('layouts.header')

<div class="bg-white py-6 sm:py-0">
  <div class="mx-auto max-w-screen-xl px-4 md:px-8">
    <div class="grid gap-8 sm:grid-cols-2 sm:gap-12">
      <!-- image - start -->
      <div class="h-80 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:rounded-none sm:shadow-none md:h-auto">
        <img src="https://images.unsplash.com/photo-1452022449339-59005948ec5b?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Jeremy Cai" class="h-full w-full object-cover object-center" />
      </div>
      <!-- image - end -->

      <!-- content - start -->
      <div class="flex flex-col items-center justify-center sm:items-start md:py-24 lg:py-32 xl:py-64">
        <h1 class="mb-2 text-center text-2xl font-bold text-gray-800 sm:text-left md:text-3xl">資料請求ありがとうございます</h1>

        <p class="mb-8 text-center text-gray-500 sm:text-left md:text-lg">物件の資料を送付します。</p>

      </div>
      <!-- content - end -->
    </div>
  </div>
</div>

@include('layouts.footer')