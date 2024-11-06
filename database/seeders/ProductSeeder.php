<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'JBL Charge 5 Portable Bluetooth speaker',
                'description' => 'Portable Bluetooth speaker with powerful sound.',
                'details' => '
                    <p><strong>JBL Flip 6 – Portable waterproof speaker</strong></p>
                    <p>Strong sound for every adventure</p>
                    <p>Your adventure. Your soundtrack. The powerful JBL Flip 6 delivers powerful JBL Original Pro Sound with exceptional clarity thanks to its 2-way speaker system that includes an optimized racetrack driver, separate tweeters and two punchy bass radiators. This powerful yet portable speaker is waterproof and dustproof so you can take it anywhere, whatever the weather. And with 12 hours of battery life, you can party until the sun goes down—or comes back up—wherever the music takes you. Use PartyBoost to connect multiple compatible speakers. The Flip 6 comes in a variety of cool colors.</p>
                    <br>
                    <p><strong>Features:</strong></p>
                    <ul>
                        <li>Loud, powerful sound</li>
                        <li>IP67 waterproof and dustproof</li>
                        <li>12 hours playback time</li>
                        <li>USB charging protection</li>
                    </ul>
                    <br>
                    <p><strong>Loud, powerful sound</strong></p>
                    <p>The beat continues with the JBL Flip 6 2-way speaker system, engineered to deliver loud, crystal clear, powerful sound. Its racetrack woofer delivers exceptional low frequencies and midrange, while a separate tweeter produces crisp, clear high frequencies. The Flip 6 also features two optimized passive radiators for deep bass fine-tuned with Harman’s advanced algorithm.</p>
                    <br>
                    <p><strong>IP67 waterproof and dustproof</strong></p>
                    <p>For the pool. For the park. JBL Flip 6 is IP67 water and dust resistant so you can take it anywhere.</p>
                    <br>
                    <p><strong>12 hours playback time</strong></p>
                    <p>Don’t worry about little things like charging the battery. JBL Flip 6 offers up to 12 hours of playback time on a single charge.</p>
                    <br>
                    <p><strong>USB charging protection</strong></p>
                    <p>Hassle-free charging. The JBL Flip 6 offers USB-C charging protection, which means that if the port detects water, salt or other chemicals, a reminder tone will alert you to unplug the device.</p>
                    <br>
                    <p><strong>Cheeky design</strong></p>
                    <p>Powerful audio meets bold design. Big sound, yet easy to carry; the design suits every personal style. Place it vertically or horizontally and choose from a variety of exciting colors.</p>
                    <br>
                    <p><strong>Give it some gas with the PartyBoost</strong></p>
                    <p>With PartyBoost, you can pair two PartyBoost compatible JBL speakers for stereo sound or connect multiple PartyBoost compatible JBL speakers to get your party going.</p>
                   <br>
                    <p><strong>Environmentally friendly packaging</strong></p>
                    <p>JBL is committed to more sustainable, eco-friendly packaging. The Flip 6 is packaged in a recyclable paper box, including the inner tray. The plastic hang tag is over 90% recycled and the exterior is printed with soy ink.</p>
                    <br>
                    <p><strong>Wireless streaming via Bluetooth</strong></p>
                    <p>Connect up to 2 smartphones or tablets wirelessly to the speaker and take turns enjoying the original JBL Pro Sound.</p>
                ',
                'price' => 160.00,
                'giveaway_price' => 150.00,
                'in_stock' => true,
                'image' => 'products/red_jbl.png',
                'category_id' => 1,
                'images' => [
                    'products/jbl1.png',
                    'products/jbl2.png',
                    'products/jbl3.png',
                    'products/jbl4.png'
                ]
            ],
        ];

        foreach ($products as $productData) {
            $images = $productData['images'];
            unset($productData['images']);

            $product = Product::firstOrCreate($productData);

            foreach ($images as $image) {
                ProductImage::firstOrCreate([
                    'product_id' => $product->id,
                    'image_path' => $image
                ]);
            }
        }
    }
}
