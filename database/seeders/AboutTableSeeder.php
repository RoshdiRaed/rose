<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if about data already exists
        if (About::count() === 0) {
            $features = [
                [
                    'feature_en' => 'Professional team with high experience and efficiency',
                    'feature_ar' => 'فريق محترف من ذوي الخبرة والكفاءة العالية'
                ],
                [
                    'feature_en' => 'Latest technologies and advanced equipment',
                    'feature_ar' => 'أحدث التقنيات والمعدات المتطورة'
                ],
                [
                    'feature_en' => 'Customized services that meet your security needs',
                    'feature_ar' => 'خدمات مخصصة تلبي احتياجاتك الأمنية'
                ]
            ];

            About::create([
                'title_en' => 'About Royal Security',
                'title_ar' => 'حول رويال سيكيوريتي',
                'description_en' => 'We are a leading security services company, providing integrated solutions to protect individuals and property with the highest standards of quality and efficiency. Our team of experienced professionals is committed to delivering exceptional security services tailored to your specific needs.',
                'description_ar' => 'نحن شركة رائدة في مجال الخدمات الأمنية، نقدم حلولاً متكاملة لحماية الأفراد والممتلكات بأعلى معايير الجودة والكفاءة. يتمتع فريقنا من المحترفين ذوي الخبرة بالالتزام بتقديم خدمات أمنية استثنائية مصممة خصيصًا لتلبية احتياجاتك المحددة.',
                'image' => 'publicimg/about.png',
                'cta_text_en' => 'Learn More About Us',
                'cta_text_ar' => 'تعرف على المزيد عنا',
                'cta_link' => '/about',
                'features' => $features,
                'is_active' => true
            ]);

            $this->command->info('About section seeded successfully!');
        } else {
            $this->command->info('About section already has data. Skipping seeding.');
        }
    }
}
