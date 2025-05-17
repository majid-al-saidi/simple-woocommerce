<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'حاسوب محمول',
                'هاتف ذكي',
                'سماعات لاسلكية',
                'ساعة ذكية',
                'كرسي ألعاب',
                'لوحة مفاتيح ميكانيكية',
                'شاشة 4K',
                'طابعة ليزر',
                'كاميرا مراقبة',
                'ماوس احترافي',
            ]),

            'description' => fake()->randomElement([
                'منتج عالي الجودة يقدم تجربة استخدام متميزة.',
                'خيار مثالي لمن يبحث عن الأداء والسعر المناسب.',
                'صنع بخامات متينة وتصميم عصري.',
                'الأكثر مبيعًا في السوق لهذا الشهر.',
                'يوفر راحة وكفاءة في العمل أو الدراسة.',
                'مناسب للاستخدام اليومي أو المهني.',
                'مزود بأحدث التقنيات وميزات ذكية.',
            ]),

            'price' => fake()->randomFloat(2, 15, 999), // بين 15 و 999 ريال
            'stock' => fake()->numberBetween(0, 200),
            'image' => 'default.png',
            'owner_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
