<!DOCTYPE html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>متجري الإلكتروني</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @endif
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
    <x-public-ui.header-nav />

    <!-- Hero Section -->
    <x-public-ui.hero />

    <!-- Products Section -->
    <section class="py-12">
        <div class="container mx-auto">
            <h3 class="text-2xl font-bold mb-6 text-center">منتجات مميزة</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded shadow p-4 text-center">
                    <img src="/images/general/get-dressed.png" alt="منتج" class="mx-auto mb-4 w-20" />
                    <h4 class="text-lg font-semibold mb-2">اسم المنتج</h4>
                    <p class="text-gray-600 mb-2">وصف مختصر للمنتج</p>
                    <span class="text-blue-700 font-bold block mb-2">10 ر.ع</span>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">أضف إلى السلة</button>
                </div>
                <!-- يمكنك تكرار الكرت أعلاه حسب الحاجة -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-6 mt-12 text-center text-gray-600">
        &copy; 2025 جميع الحقوق محفوظة - متجري
    </footer>

</body>

</html>
