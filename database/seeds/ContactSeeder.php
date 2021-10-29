<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Modules\Contact\Contact::create([
            'title' => 'Contact Us And Get In Touch',
			'content' => 'Punya pertanyaan seputar perawatan kulit atau pelayanan kami?
							Hubungi kami melalui channel yang tersedia dibawah ini dan
							customer care kami akan membantu menjawab kebutuhan Anda.',
        ]);
    }
}
