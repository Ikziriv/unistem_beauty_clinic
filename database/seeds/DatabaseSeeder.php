<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\Modules\Header\Header::create([
            'title' => 'Specialize In Aesthetic Treatment',
            'subtitle' => 'Beauty & Rejuvenation Treatment',
            'phone' => '+6221 29629111',
        ]);

        App\Modules\Bottom\Bottom::create([
            'address' => 'PT. Unistem Asia Jl. Pemuda No.3 Rawamangun - Jakarta Timur Indonesia 13220',
        ]);

        App\Modules\SosialLink\SosialLink::create([
            'name' => 'Twitter',
            'link' => '',
            'icon' => 'icon-twitter',
        ]);
        App\Modules\SosialLink\SosialLink::create([
            'name' => 'Facebook',
            'link' => '',
            'icon' => 'icon-facebook',
        ]);
        App\Modules\SosialLink\SosialLink::create([
            'name' => 'Linkedin',
            'link' => '',
            'icon' => 'icon-linkedin',
        ]);

        App\Modules\OpenHour\OpenHour::create([
            'days' => 'Mon-Fri',
            'time' => ' 7:30-18:00',
        ]);
        App\Modules\OpenHour\OpenHour::create([
            'days' => 'Sat',
            'time' => '7:30-18:00',
        ]);
        App\Modules\OpenHour\OpenHour::create([
            'days' => 'Sun',
            'time' => '7:30-18:00',
        ]);

        App\User::create([
            'name' => 'Administrator',
			'email' => 'unistem@admin.com',
            'password' => bcrypt('secret'),
        ]);

        App\Modules\Category\Category::create([
            'name' => 'Kesehatan',
        ]);
        
        App\Modules\Post\Post::create([
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'Ragam Terapi Untuk Cegah Penuaan Dan Menjaga Kulit Tetap Sehat.',
            'slug' => 'ragam_terapi_untuk_cegah_penuaan_dan_menjaga_kulit_tetap_sehat',
            'img_path' => '',
            'sub_title' => 'PENUAAN PADA KULIT DAPAT TERJADI SEIRING BERTAMBAHNYA USIA.',
            'content' => trim('Penuaan pada kulit dapat terjadi seiring bertambahnya usia. Selain menerapkan gaya hidup sehat, berbagai terapi untuk meremajakan kulit dan menjaga kulit tetap sehat juga bisa dilakukan.'),
            'posted_at' => now(),
        ]);
        
        App\Modules\Contact\Contact::create([
            'title' => 'Contact Us And Get In Touch',
            'content' => trim('Punya pertanyaan seputar perawatan kulit atau pelayanan kami? Hubungi kami melalui channel yang tersedia dibawah ini dan customer care kami akan membantu menjawab kebutuhan Anda.'),
        ]);
        
        App\Modules\About\About::create([
            'img_head' => 'img/bamed/about.png',
            'title' => 'UNISTEM hadir untuk membantu Anda memiliki kulit yang sehat dengan metode perawatan yang terukur dan aman dan dilakukan profesional medis di bidang ilmu kesehatan kulit dan kelamin.',
            'content' => 'Berdiri sejak Agustus 2010, UNISTEM adalah klinik dermatovenereology yang hadir untuk memberikan perawatan terbaik bagi setiap orang, dengan setiap jenis kulit. Kami percaya bahwa menjadi diri sendiri adalah suatu keindahan. Munculkan rasa nyaman lewat kulit Anda dengan memahami perawatan yang tepat melalui konsultasi dengan tim yang profesional dan ahli di bidangnya. Selama bertahun-tahun, tim dermatologis kami telah mendedikasikan keahlian serta pengalamannya untuk membantu orang dari berbagai usia dalam menciptakan kecantikan dari luar dan dalam lewat kulit yang sehat.',
        ]);

        App\Modules\Department\Department::create([
            'name' => 'Rejuvenation',
            'slug' => 'rejuvenation',
        ]);
        App\Modules\Department\Department::create([
            'name' => 'Hair Treatment',
            'slug' => 'hair-treatment',
            'description' => 'Hair care is an overall term for hygiene and cosmetology involving the hair which grows from the human scalp, and to a lesser extent facial, pubic and other body hair. Hair care routines differ according to an individuals culture and the physical characteristics of ones hair. Hair may be colored, trimmed, shaved, plucked or otherwise removed with treatments such as waxing, sugaring and threading. Hair care services are offered in salons, barbershops and day spas, and products are available commercially for home use. Laser hair removal and electrolysis are also available, though these are provided (in the US) by licensed professionals in medical offices or speciality spas.',
        ]);
        App\Modules\Department\Department::create([
            'name' => 'Plastic Surgery',
            'slug' => 'plastic-surgery',
        ]);
        App\Modules\Department\Department::create([
            'name' => 'Slimming Program',
            'slug' => 'slimming-program',
            'img_path' => '',
            'description' => 'A body slimming program using most up to date and advanced radiofrequency machine to achieve more ideal body shape and size.',
        ]);
        App\Modules\Department\Department::create([
            'name' => 'General Dermatology',
            'slug' => 'general-dermatology',
            'img_path' => '',
            'description' => 'Is a thorough treatment for skin problem, hair and nail for all ages. We have our team of professional and experienced dermatologist along with advanced up to date technology in dermatology. We will ensure a comprehensive treatment program for managing your complex dermatologic problems.',
        ]);
        
        App\Modules\Service\Service::create([
            'title' => 'Kulit Anda adalah aset berharga dan unik yang membutuhkan perawatan yang tepat.',
            'content' => 'Kepribadian setiap individu seunik kulit mereka. Karena itulah UNISTEM mendedikasikan hasil penelitian mendalam kami untuk menghadirkan beragam metode perawatan untuk berbagai jenis kulit. Dengan teknologi serta metode yang telah terbukti secara medis, kami siap memenuhi apapun kebutuhan kulit Anda.',
        ]);
        // SubService
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Platelet Rich Plasma',
            'slug' => 'platelet-rich-plasma',
            'img_head' => '',
            'content' => 'Platelet Rich Plama (PRP) is a practical and efficient method for skin rejuvenation. The method involves the collection of patient’s blood, which then processed using our advanced technology and be used for anti aging purposes.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Stem Cell Regenerative Theraphy',
            'slug' => 'stem-cell-regenerative-theraphy',
            'img_head' => '',
            'content' => 'Stem Cell Regenerative & Rejuvenation Therapy Is a breakthrough technology in medical field, using Fat Activated Stem Cell (FAST Cell) Technology. ',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Laser',
            'slug' => 'laser',
            'img_head' => '',
            'content' => 'Advanced technology with laser could be used for photo-rejuvenation. This treatment could improve skin texture, eliminate age spots, as well as smoothen fine lines and skin pigmentation. This treatment could also be used for tattoo removal.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Skin Tightening',
            'slug' => 'skin-tightening',
            'img_head' => '',
            'content' => 'Losing skin elasticity is one of the sign of aging. Appearance of wrinkles and fine lines, are the most common skin-aging problem that are visible.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Botox',
            'slug' => 'botox',
            'img_head' => '',
            'content' => 'Botox is a substance that is used for relaxing contracted muscles (the cause of wrinkle appearance) by injecting it to the patient’s problem area.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Skin Filler',
            'slug' => 'skin-filler',
            'img_head' => '',
            'content' => 'It is a method whereby filler is injected in the area under the skin. This method is effective to reduce the appearance of wrinkles and frown lines due to aging process to acquire fresh, youthful appearance.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Mesotherapy',
            'slug' => 'mesotherapy',
            'img_head' => '',
            'content' => 'A technique of injecting natural medication and vitamins into skin layer by using small needle. It is a special treatment for various skin problems such as melasma and black spots, brighten face complexion, face firming, and elimination of acne scar.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Facial Care',
            'slug' => 'facial-care',
            'img_head' => '',
            'content' => 'The perfect care for the face is needed for radiant and glowing skin. Our facial care is done by removing damaged outer layer of the skin. Thus, this treatment helps patient to manage acne breakout, sun damaged skin, oily skin, dry skin and sensitive skin.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 1,
            'title' => 'Vitamin C Injection',
            'slug' => 'vitamin-c-injection',
            'img_head' => '',
            'content' => 'If you are unhappy with the shade of your skin or have skin pigmentation issues, then a skin brightening infusions could be for you.',
        ]);
        
        App\Modules\Service\SubService::create([
            'dept_id' => 2,
            'title' => 'Restoration & Hair Transplantation',
            'slug' => 'restoration-hair-transplantation',
            'img_head' => '',
            'content' => 'Hair Stemcell Transplantation Is the most advanced up to date method of transplantation using a portion of hair stem cell as donor to be implanted onto bald or thinning area. This technique guarantees the regrow of hair on the area of baldness including the area of burn wound, scar from accident and surgical procedures or any other cause disfiguring injuries.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 2,
            'title' => 'Hair Transplantation',
            'slug' => 'hair-transplantation',
            'img_head' => '',
            'content' => 'Hair Stemcell Transplantation Is the most advanced up to date method of transplantation using a portion of hair stem cell as donor to be implanted onto bald or thinning area. This technique guarantees the regrow of hair on the area of baldness including the area of burn wound, scar from accident and surgical procedures or any other cause disfiguring injuries.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 2,
            'title' => 'Permanent Hair Removal',
            'slug' => 'permanent-hair-removal',
            'img_head' => '',
            'content' => 'Excess growth of unwanted hair often occurs on the lower legs, underarm, lower arm, and face. With advanced technology and our team of experts, those unwanted hair could be eliminated using our Intense Pulsed Light (IPL) treatment.',
        ]);

        App\Modules\Service\SubService::create([
            'dept_id' => 3,
            'title' => 'Scar Revision',
            'slug' => 'scar-revision',
            'img_head' => '',
            'content' => 'A medical treatment to improve the appearance of scars caused by acne or any other cause disfiguring injuries.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 3,
            'title' => 'Bhlepharosplasty',
            'slug' => 'bhlepharosplasty',
            'img_head' => '',
            'content' => 'A medical surgery procedure to correct the appearance of eyelids and eye bags to appear more ideal, thus provide a more youthful appearance.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 3,
            'title' => 'Mini Facelift',
            'slug' => 'mini-facelift',
            'img_head' => '',
            'content' => 'A medical surgery procedure to tighten the skin around face area, thus reducing the appearance of fine lines and wrinkles',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 3,
            'title' => 'Liposuction (Sedot Lemak)',
            'slug' => 'liposuction',
            'img_head' => '',
            'content' => 'A technique of fat reduction in areas that has excess fat, most commonly at the abdomen area, thighs, upper and backs of the arms etc. Thus, by doing liposuction, more slimmer and ideal body could be achieved.',
        ]);
        App\Modules\Service\SubService::create([
            'dept_id' => 3,
            'title' => 'Threadlift',
            'slug' => 'threadlift',
            'img_head' => '',
            'content' => 'As we age, the effects of gravity become more noticeable. In the face, the supporting tissues of the cheeks weaken, facial fat is lost, the jawline that used to be firm and tight forms jowls, the edges of the mouth drift down towards the chin, and the lower face and neck sags',
        ]);
        
        // ------------------------------------------
        App\Modules\Doctor\Doctor::create([
            'title' => 'Doctors',
            'content' => 'Cara terbaik untuk mengetahui metode perawatan yang tepat untuk kulit Anda adalah melalui konsultasi dengan tim ahli kami. Tim dermatologist UNISTEM terdiri dari para dokter ahli yang ramah dan berpengalaman untuk membantu Anda mendapatkan kulit yang sehat dan indah. Dengan menggunakan metode medis yang terpercaya, kami akan membantu memberikan perawatan terbaik untuk kulit Anda melalui solusi yang cermat dan tepat.',
        ]);
        
        App\Modules\Doctor\DoctorSub::create([
            'img_head' => '',
            'name' => 'Dr. Adhimukti T. Sampurna, SpKK',
            'sub_title' => 'Travel Junkie, Automotive Enthusiast, Movie ',
            'quote' => 'Doing everything my way.',
            'phone' => '0897651113',
            'content' => 'Selain membantu pasien dan member UNISTEM memilih perawatan kulit yang tepat, pria yang biasa dipanggil Adhi ini aktif sebagai staf pengajar di Dept. Ilmu Kesehatan Kulit & Kelamin FKUI/RSCM serta Ketua Divisi Tumor dan Bedah Kulit Dept. Ilmu Kulit & Kelamin FKUI/RSCM. Dokter Adhi, yang merupakan penggemar kuliner, fotograﬁ, serta superheroes ini mendeskripsikan dirinya sebagai seseorang yang ramah serta terbuka dalam memberikan hal-hal informatif tentang kesehatan kulit.',
        ]);
        
        App\Modules\Doctor\DoctorSub::create([
            'img_head' => '',
            'name' => 'Dr. Jimmi Chandra',
            'sub_title' => 'Travel Junkie, Automotive Enthusiast, Movie ',
            'quote' => 'Doing everything my way.',
            'phone' => '0897651113',
            'content' => 'Selain membantu pasien dan member UNISTEM memilih perawatan kulit yang tepat, pria yang biasa dipanggil Adhi ini aktif sebagai staf pengajar di Dept. Ilmu Kesehatan Kulit & Kelamin FKUI/RSCM serta Ketua Divisi Tumor dan Bedah Kulit Dept. Ilmu Kulit & Kelamin FKUI/RSCM. Dokter Adhi, yang merupakan penggemar kuliner, fotograﬁ, serta superheroes ini mendeskripsikan dirinya sebagai seseorang yang ramah serta terbuka dalam memberikan hal-hal informatif tentang kesehatan kulit.',
        ]);

        App\Modules\Client\Client::create([
            'name' => 'Aria Guest',
            'email' => 'aria@test.io',
            'password' => bcrypt('secret'),
        ]);
        // City
        App\Modules\City\City::create([
            'name' => 'Meruya',
            'tlp' => '(021) 5843456, 5844512',
            'lat' => '-6.19743',
            'long' => '106.745209',
            'address' => 'Meruya'
        ]);
        App\Modules\City\City::create([
            'name' => 'Menteng',
            'tlp' => '(021) 5843456, 5844512',
            'lat' => '-6.19743',
            'long' => '106.745209',
            'address' => 'Menteng'
        ]);
        App\Modules\City\City::create([
            'name' => 'Dharmawangsa',
            'tlp' => '(021) 5843456, 5844512',
            'lat' => '-6.19743',
            'long' => '106.745209',
            'address' => 'Dharmawangsa'
        ]);

        App\Modules\Testimonial\Testimonial::create([
            'name' => 'Yully',
            'message' => 'Facial gold nya enak banget, kulit wajah terlihat lebih segar dan kencang seketika setelah perawatan facial ini. Wajib coba de Facial gold nya'
        ]);

        App\Modules\Hasci\HasciHeader::create([
            'img_head' => '',
            'title' => 'Hair Science Institute Asia',
            'content' => 'Hair Science Institute Asia is an institute for advanced hair transplantation and multiplication. We distinguish ourselves from other clinics through our unique hair transplantation technique'
        ]);

        App\Modules\Hasci\HasciBody::create([
            'img_head' => '',
            'title' => 'Transplantasi Rambut dengan Teknik Stem cell / Sel puncak (Hair Stem cell Transplantation)',
            'content' => 'Hair Stem cell Transplantation ( HST)  adalah metode transplantasi yang dikembangkan dan dipatenkan oleh Hair Science Institute. Ini merupakan metode tercanggih dan terbaik saat ini yang ditemukan oleh seorang Ahli Belanda Dr. Coen Gho setelah melewati  Penelitan selama bertahun tahun dan telah mendapatkan pengakuan international di bidang rambut dan kulit kepala dan sudah dipatenkan. Metode ini menggunakan stem cell Folikel / akar rambut dari kepala bagian belakang  sebagai donor yang ditanamkan ke bagian kepala  yang mengalami penipisan rambut atau kebotakan, tanpa ada operasi dan persiapan khusus sebelumnya.  Dengan metode ini rambut di area donor akan tumbuh  kembali sehingga jumlahnya relative tidak berkurang , dengan demikian tranplantasi dapat dilakukan lebih dari 1 kali khususnya bagi seseorang yang memiliki donor yang terbatas disertai kebotakan yang  luas. Unistem Clinic Jakarta bekerja sama dengan Hair Science Institute memberikan pelayanan tranplantasi rambut dengan metode tersebut diatas.'
        ]);

        App\Modules\Hasci\HasciLink::create([
            'img_head' => '',
            'title' => 'Proses Hair Transplantation',
            'link' => 'https://www.youtube.com/watch?v=vXl0CvHFImE'
        ]);

        App\Modules\Hasci\HasciMetode::create([
            'kriteria' => 'Persiapan khusus pratransplantasi',
            'konvensional' => 'Pemeriksaan Darah dan diet khusus',
            'stemcell' => 'Tidak Ada'
        ]);
    }
}
