<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('city_sectors')->delete();
        
        \DB::table('city_sectors')->insert(array (
            0 => 
            array (
                'id' => 14000,
                'city_id' => 21,
                'city_sector_name_fr' => 'al kasaba',
                'city_sector_status' => 1,
            ),
            1 => 
            array (
                'id' => 14001,
                'city_id' => 21,
                'city_sector_name_fr' => 'aviation',
                'city_sector_status' => 1,
            ),
            2 => 
            array (
                'id' => 14002,
                'city_id' => 21,
                'city_sector_name_fr' => 'cap spartel',
                'city_sector_status' => 1,
            ),
            3 => 
            array (
                'id' => 14003,
                'city_id' => 21,
                'city_sector_name_fr' => 'centre ville',
                'city_sector_status' => 1,
            ),
            4 => 
            array (
                'id' => 14004,
                'city_id' => 21,
                'city_sector_name_fr' => 'cité californie',
                'city_sector_status' => 1,
            ),
            5 => 
            array (
                'id' => 14005,
                'city_id' => 21,
                'city_sector_name_fr' => 'girari',
                'city_sector_status' => 1,
            ),
            6 => 
            array (
                'id' => 14006,
                'city_id' => 21,
                'city_sector_name_fr' => 'ibn taymia',
                'city_sector_status' => 1,
            ),
            7 => 
            array (
                'id' => 14007,
                'city_id' => 21,
                'city_sector_name_fr' => 'M nar',
                'city_sector_status' => 1,
            ),
            8 => 
            array (
                'id' => 14008,
                'city_id' => 21,
                'city_sector_name_fr' => 'M ssalah',
                'city_sector_status' => 1,
            ),
            9 => 
            array (
                'id' => 14009,
                'city_id' => 21,
                'city_sector_name_fr' => 'makhoukha',
                'city_sector_status' => 1,
            ),
            10 => 
            array (
                'id' => 14010,
                'city_id' => 21,
                'city_sector_name_fr' => 'malabata',
                'city_sector_status' => 1,
            ),
            11 => 
            array (
                'id' => 14011,
                'city_id' => 21,
                'city_sector_name_fr' => 'marchane',
                'city_sector_status' => 1,
            ),
            12 => 
            array (
                'id' => 14012,
                'city_id' => 21,
                'city_sector_name_fr' => 'marjane',
                'city_sector_status' => 1,
            ),
            13 => 
            array (
                'id' => 14013,
                'city_id' => 21,
                'city_sector_name_fr' => 'moujahiddine',
                'city_sector_status' => 1,
            ),
            14 => 
            array (
                'id' => 14014,
                'city_id' => 21,
                'city_sector_name_fr' => 'moulay youssef',
                'city_sector_status' => 1,
            ),
            15 => 
            array (
                'id' => 14015,
                'city_id' => 21,
                'city_sector_name_fr' => 'santa',
                'city_sector_status' => 1,
            ),
            16 => 
            array (
                'id' => 14016,
                'city_id' => 21,
                'city_sector_name_fr' => 'val fleuri',
                'city_sector_status' => 1,
            ),
            17 => 
            array (
                'id' => 14017,
                'city_id' => 21,
                'city_sector_name_fr' => 'vieille montagne',
                'city_sector_status' => 1,
            ),
            18 => 
            array (
                'id' => 14018,
                'city_id' => 21,
                'city_sector_name_fr' => 'ziatene',
                'city_sector_status' => 1,
            ),
            19 => 
            array (
                'id' => 14019,
                'city_id' => 21,
                'city_sector_name_fr' => 'achennad',
                'city_sector_status' => 1,
            ),
            20 => 
            array (
                'id' => 14020,
                'city_id' => 21,
                'city_sector_name_fr' => 'aharrarine',
                'city_sector_status' => 1,
            ),
            21 => 
            array (
                'id' => 14021,
                'city_id' => 21,
                'city_sector_name_fr' => 'ahlane',
                'city_sector_status' => 1,
            ),
            22 => 
            array (
                'id' => 14022,
                'city_id' => 21,
                'city_sector_name_fr' => 'aida',
                'city_sector_status' => 1,
            ),
            23 => 
            array (
                'id' => 14023,
                'city_id' => 21,
                'city_sector_name_fr' => 'Al anbar ',
                'city_sector_status' => 1,
            ),
            24 => 
            array (
                'id' => 14024,
                'city_id' => 21,
                'city_sector_name_fr' => 'al wahda ',
                'city_sector_status' => 1,
            ),
            25 => 
            array (
                'id' => 14025,
                'city_id' => 21,
                'city_sector_name_fr' => 'aouama gharbia',
                'city_sector_status' => 1,
            ),
            26 => 
            array (
                'id' => 14026,
                'city_id' => 21,
                'city_sector_name_fr' => 'beausejour',
                'city_sector_status' => 1,
            ),
            27 => 
            array (
                'id' => 14027,
                'city_id' => 21,
                'city_sector_name_fr' => 'behair',
                'city_sector_status' => 1,
            ),
            28 => 
            array (
                'id' => 14028,
                'city_id' => 21,
                'city_sector_name_fr' => 'ben dibane',
                'city_sector_status' => 1,
            ),
            29 => 
            array (
                'id' => 14029,
                'city_id' => 21,
                'city_sector_name_fr' => 'beni makada lakdima',
                'city_sector_status' => 1,
            ),
            30 => 
            array (
                'id' => 14030,
                'city_id' => 21,
                'city_sector_name_fr' => 'beni said',
                'city_sector_status' => 1,
            ),
            31 => 
            array (
                'id' => 14031,
                'city_id' => 21,
                'city_sector_name_fr' => 'beni touzine',
                'city_sector_status' => 1,
            ),
            32 => 
            array (
                'id' => 14032,
                'city_id' => 21,
                'city_sector_name_fr' => 'bir aharchoune',
                'city_sector_status' => 1,
            ),
            33 => 
            array (
                'id' => 14033,
                'city_id' => 21,
                'city_sector_name_fr' => 'bir chifa',
                'city_sector_status' => 1,
            ),
            34 => 
            array (
                'id' => 14034,
                'city_id' => 21,
                'city_sector_name_fr' => 'bir el ghazi ',
                'city_sector_status' => 1,
            ),
            35 => 
            array (
                'id' => 14035,
                'city_id' => 21,
                'city_sector_name_fr' => 'bouchta abdelatif',
                'city_sector_status' => 1,
            ),
            36 => 
            array (
                'id' => 14036,
                'city_id' => 21,
                'city_sector_name_fr' => 'bouhout 1',
                'city_sector_status' => 1,
            ),
            37 => 
            array (
                'id' => 14037,
                'city_id' => 21,
                'city_sector_name_fr' => 'bouhout2',
                'city_sector_status' => 1,
            ),
            38 => 
            array (
                'id' => 14038,
                'city_id' => 21,
                'city_sector_name_fr' => 'dher ahjjam',
                'city_sector_status' => 1,
            ),
            39 => 
            array (
                'id' => 14039,
                'city_id' => 21,
                'city_sector_name_fr' => 'dher lahmam',
                'city_sector_status' => 1,
            ),
            40 => 
            array (
                'id' => 14040,
                'city_id' => 21,
                'city_sector_name_fr' => 'el baraka',
                'city_sector_status' => 1,
            ),
            41 => 
            array (
                'id' => 14041,
                'city_id' => 21,
                'city_sector_name_fr' => 'el haj el mokhtar',
                'city_sector_status' => 1,
            ),
            42 => 
            array (
                'id' => 14042,
                'city_id' => 21,
                'city_sector_name_fr' => 'el khair1',
                'city_sector_status' => 1,
            ),
            43 => 
            array (
                'id' => 14043,
                'city_id' => 21,
                'city_sector_name_fr' => 'elkhair2',
                'city_sector_status' => 1,
            ),
            44 => 
            array (
                'id' => 14044,
                'city_id' => 21,
                'city_sector_name_fr' => 'el mers1',
                'city_sector_status' => 1,
            ),
            45 => 
            array (
                'id' => 14045,
                'city_id' => 21,
                'city_sector_name_fr' => 'el mers2',
                'city_sector_status' => 1,
            ),
            46 => 
            array (
                'id' => 14046,
                'city_id' => 21,
                'city_sector_name_fr' => 'el merabet',
                'city_sector_status' => 1,
            ),
            47 => 
            array (
                'id' => 14047,
                'city_id' => 21,
                'city_sector_name_fr' => 'ennasr',
                'city_sector_status' => 1,
            ),
            48 => 
            array (
                'id' => 14048,
                'city_id' => 21,
                'city_sector_name_fr' => 'goursiana',
                'city_sector_status' => 1,
            ),
            49 => 
            array (
                'id' => 14049,
                'city_id' => 21,
                'city_sector_name_fr' => 'haddad',
                'city_sector_status' => 1,
            ),
            50 => 
            array (
                'id' => 14050,
                'city_id' => 21,
                'city_sector_name_fr' => 'hanaa1',
                'city_sector_status' => 1,
            ),
            51 => 
            array (
                'id' => 14051,
                'city_id' => 21,
                'city_sector_name_fr' => 'hanaa2',
                'city_sector_status' => 1,
            ),
            52 => 
            array (
                'id' => 14052,
                'city_id' => 21,
                'city_sector_name_fr' => 'hanaa3',
                'city_sector_status' => 1,
            ),
            53 => 
            array (
                'id' => 14053,
                'city_id' => 21,
                'city_sector_name_fr' => 'jirrari',
                'city_sector_status' => 1,
            ),
            54 => 
            array (
                'id' => 14054,
                'city_id' => 21,
                'city_sector_name_fr' => 'les rosiers',
                'city_sector_status' => 1,
            ),
            55 => 
            array (
                'id' => 14055,
                'city_id' => 21,
                'city_sector_name_fr' => 'zemmouri',
                'city_sector_status' => 1,
            ),
            56 => 
            array (
                'id' => 14056,
                'city_id' => 21,
                'city_sector_name_fr' => 'zouitina',
                'city_sector_status' => 1,
            ),
            57 => 
            array (
                'id' => 14057,
                'city_id' => 21,
                'city_sector_name_fr' => 'al amal',
                'city_sector_status' => 1,
            ),
            58 => 
            array (
                'id' => 14058,
                'city_id' => 21,
                'city_sector_name_fr' => 'al mandar al jamil',
                'city_sector_status' => 1,
            ),
            59 => 
            array (
                'id' => 14059,
                'city_id' => 21,
                'city_sector_name_fr' => 'alia',
                'city_sector_status' => 1,
            ),
            60 => 
            array (
                'id' => 14060,
                'city_id' => 21,
                'city_sector_name_fr' => 'benkirane',
                'city_sector_status' => 1,
            ),
            61 => 
            array (
                'id' => 14061,
                'city_id' => 21,
                'city_sector_name_fr' => 'charf',
                'city_sector_status' => 1,
            ),
            62 => 
            array (
                'id' => 14062,
                'city_id' => 21,
                'city_sector_name_fr' => 'draoua',
                'city_sector_status' => 1,
            ),
            63 => 
            array (
                'id' => 14063,
                'city_id' => 21,
                'city_sector_name_fr' => 'drissia',
                'city_sector_status' => 1,
            ),
            64 => 
            array (
                'id' => 14064,
                'city_id' => 21,
                'city_sector_name_fr' => 'el majd',
                'city_sector_status' => 1,
            ),
            65 => 
            array (
                'id' => 14065,
                'city_id' => 21,
                'city_sector_name_fr' => 'el majd',
                'city_sector_status' => 1,
            ),
            66 => 
            array (
                'id' => 14066,
                'city_id' => 21,
                'city_sector_name_fr' => 'el oued',
                'city_sector_status' => 1,
            ),
            67 => 
            array (
                'id' => 14067,
                'city_id' => 21,
                'city_sector_name_fr' => 'mghogha',
                'city_sector_status' => 1,
            ),
            68 => 
            array (
                'id' => 14068,
                'city_id' => 21,
                'city_sector_name_fr' => 'nzaha',
                'city_sector_status' => 1,
            ),
            69 => 
            array (
                'id' => 14069,
                'city_id' => 21,
                'city_sector_name_fr' => 'sania',
                'city_sector_status' => 1,
            ),
            70 => 
            array (
                'id' => 14070,
                'city_id' => 21,
                'city_sector_name_fr' => 'tanger city center',
                'city_sector_status' => 1,
            ),
            71 => 
            array (
                'id' => 14071,
                'city_id' => 21,
                'city_sector_name_fr' => 'tanja balia',
                'city_sector_status' => 1,
            ),
            72 => 
            array (
                'id' => 14072,
                'city_id' => 21,
                'city_sector_name_fr' => 'zone industrielle mghogha',
                'city_sector_status' => 1,
            ),
            73 => 
            array (
                'id' => 14073,
                'city_id' => 21,
                'city_sector_name_fr' => 'azib haj kaddour',
                'city_sector_status' => 1,
            ),
            74 => 
            array (
                'id' => 14074,
                'city_id' => 21,
                'city_sector_name_fr' => 'bel air-val fleuri',
                'city_sector_status' => 1,
            ),
            75 => 
            array (
                'id' => 14075,
                'city_id' => 21,
                'city_sector_name_fr' => 'bir chairi',
                'city_sector_status' => 1,
            ),
            76 => 
            array (
                'id' => 14076,
                'city_id' => 21,
                'city_sector_name_fr' => 'branes1',
                'city_sector_status' => 1,
            ),
            77 => 
            array (
                'id' => 14077,
                'city_id' => 21,
                'city_sector_name_fr' => 'branes2',
                'city_sector_status' => 1,
            ),
            78 => 
            array (
                'id' => 14078,
                'city_id' => 21,
                'city_sector_name_fr' => 'casabarata',
                'city_sector_status' => 1,
            ),
            79 => 
            array (
                'id' => 14079,
                'city_id' => 21,
                'city_sector_name_fr' => 'castilla',
                'city_sector_status' => 1,
            ),
            80 => 
            array (
                'id' => 14080,
                'city_id' => 21,
                'city_sector_name_fr' => 'hay el bassatine',
                'city_sector_status' => 1,
            ),
            81 => 
            array (
                'id' => 14081,
                'city_id' => 21,
                'city_sector_name_fr' => 'hay el boughaz',
                'city_sector_status' => 1,
            ),
            82 => 
            array (
                'id' => 14082,
                'city_id' => 21,
                'city_sector_name_fr' => 'hay zaoudia ',
                'city_sector_status' => 1,
            ),
            83 => 
            array (
                'id' => 14083,
                'city_id' => 21,
                'city_sector_name_fr' => 'lalla chafia',
                'city_sector_status' => 1,
            ),
            84 => 
            array (
                'id' => 14084,
                'city_id' => 21,
                'city_sector_name_fr' => 'souani',
                'city_sector_status' => 1,
            ),
            85 => 
            array (
                'id' => 14085,
                'city_id' => 21,
                'city_sector_name_fr' => 'achakar',
                'city_sector_status' => 1,
            ),
            86 => 
            array (
                'id' => 14086,
                'city_id' => 21,
                'city_sector_name_fr' => 'administratif',
                'city_sector_status' => 1,
            ),
            87 => 
            array (
                'id' => 14087,
                'city_id' => 21,
                'city_sector_name_fr' => 'ahammar',
                'city_sector_status' => 1,
            ),
            88 => 
            array (
                'id' => 14088,
                'city_id' => 21,
                'city_sector_name_fr' => 'ain el hayani',
                'city_sector_status' => 1,
            ),
            89 => 
            array (
                'id' => 14089,
                'city_id' => 21,
                'city_sector_name_fr' => 'algerie',
                'city_sector_status' => 1,
            ),
            90 => 
            array (
                'id' => 14090,
                'city_id' => 21,
                'city_sector_name_fr' => 'branes kdima',
                'city_sector_status' => 1,
            ),
            91 => 
            array (
                'id' => 14091,
                'city_id' => 21,
                'city_sector_name_fr' => 'californie',
                'city_sector_status' => 1,
            ),
            92 => 
            array (
                'id' => 16007,
                'city_id' => 23,
                'city_sector_name_fr' => 'boujarah',
                'city_sector_status' => 1,
            ),
            93 => 
            array (
                'id' => 14093,
                'city_id' => 21,
                'city_sector_name_fr' => 'de la plage',
                'city_sector_status' => 1,
            ),
            94 => 
            array (
                'id' => 14094,
                'city_id' => 21,
                'city_sector_name_fr' => 'golf',
                'city_sector_status' => 1,
            ),
            95 => 
            array (
                'id' => 14095,
                'city_id' => 21,
                'city_sector_name_fr' => 'hay hassani',
                'city_sector_status' => 1,
            ),
            96 => 
            array (
                'id' => 14096,
                'city_id' => 21,
                'city_sector_name_fr' => 'Iberie',
                'city_sector_status' => 1,
            ),
            97 => 
            array (
                'id' => 14097,
                'city_id' => 21,
                'city_sector_name_fr' => 'jbel kbir',
                'city_sector_status' => 1,
            ),
            98 => 
            array (
                'id' => 14098,
                'city_id' => 21,
                'city_sector_name_fr' => 'laaouina ',
                'city_sector_status' => 1,
            ),
            99 => 
            array (
                'id' => 14099,
                'city_id' => 21,
                'city_sector_name_fr' => 'marchan',
                'city_sector_status' => 1,
            ),
            100 => 
            array (
                'id' => 14100,
                'city_id' => 21,
                'city_sector_name_fr' => 'mediouna',
                'city_sector_status' => 1,
            ),
            101 => 
            array (
                'id' => 14101,
                'city_id' => 21,
                'city_sector_name_fr' => 'mesnana',
                'city_sector_status' => 1,
            ),
            102 => 
            array (
                'id' => 14102,
                'city_id' => 21,
                'city_sector_name_fr' => 'mghayer',
                'city_sector_status' => 1,
            ),
            103 => 
            array (
                'id' => 14103,
                'city_id' => 21,
                'city_sector_name_fr' => 'mister khouch',
                'city_sector_status' => 1,
            ),
            104 => 
            array (
                'id' => 14104,
                'city_id' => 21,
                'city_sector_name_fr' => 'mozart',
                'city_sector_status' => 1,
            ),
            105 => 
            array (
                'id' => 14105,
                'city_id' => 21,
                'city_sector_name_fr' => 'msala',
                'city_sector_status' => 1,
            ),
            106 => 
            array (
                'id' => 14106,
                'city_id' => 21,
                'city_sector_name_fr' => 'medina',
                'city_sector_status' => 1,
            ),
            107 => 
            array (
                'id' => 14107,
                'city_id' => 21,
                'city_sector_name_fr' => 'port tanger ville',
                'city_sector_status' => 1,
            ),
            108 => 
            array (
                'id' => 14108,
                'city_id' => 21,
                'city_sector_name_fr' => 'rmilat',
                'city_sector_status' => 1,
            ),
            109 => 
            array (
                'id' => 14109,
                'city_id' => 21,
                'city_sector_name_fr' => 'star hill',
                'city_sector_status' => 1,
            ),
            110 => 
            array (
                'id' => 14110,
                'city_id' => 21,
                'city_sector_name_fr' => 'mana',
                'city_sector_status' => 1,
            ),
            111 => 
            array (
                'id' => 15000,
                'city_id' => 23,
                'city_sector_name_fr' => 'al azhar',
                'city_sector_status' => 1,
            ),
            112 => 
            array (
                'id' => 15001,
                'city_id' => 23,
                'city_sector_name_fr' => 'centre ville',
                'city_sector_status' => 1,
            ),
            113 => 
            array (
                'id' => 15002,
                'city_id' => 23,
                'city_sector_name_fr' => 'dersa ',
                'city_sector_status' => 1,
            ),
            114 => 
            array (
                'id' => 15003,
                'city_id' => 23,
                'city_sector_name_fr' => 'kouilma',
                'city_sector_status' => 1,
            ),
            115 => 
            array (
                'id' => 15004,
                'city_id' => 23,
                'city_sector_name_fr' => 'medina',
                'city_sector_status' => 1,
            ),
            116 => 
            array (
                'id' => 15005,
                'city_id' => 23,
                'city_sector_name_fr' => 'mhannech',
                'city_sector_status' => 1,
            ),
            117 => 
            array (
                'id' => 15006,
                'city_id' => 23,
                'city_sector_name_fr' => 'safir',
                'city_sector_status' => 1,
            ),
            118 => 
            array (
                'id' => 15007,
                'city_id' => 23,
                'city_sector_name_fr' => 'saniat rmal',
                'city_sector_status' => 1,
            ),
            119 => 
            array (
                'id' => 15008,
                'city_id' => 23,
                'city_sector_name_fr' => 'sidi el mandri',
                'city_sector_status' => 1,
            ),
            120 => 
            array (
                'id' => 15009,
                'city_id' => 23,
                'city_sector_name_fr' => 'sidi talha',
                'city_sector_status' => 1,
            ),
            121 => 
            array (
                'id' => 15010,
                'city_id' => 23,
                'city_sector_name_fr' => 'slaoui',
                'city_sector_status' => 1,
            ),
            122 => 
            array (
                'id' => 15011,
                'city_id' => 23,
                'city_sector_name_fr' => 'torrita',
                'city_sector_status' => 1,
            ),
            123 => 
            array (
                'id' => 15012,
                'city_id' => 23,
                'city_sector_name_fr' => 'touilaa',
                'city_sector_status' => 1,
            ),
            124 => 
            array (
                'id' => 15013,
                'city_id' => 23,
                'city_sector_name_fr' => 'route de ceuta',
                'city_sector_status' => 1,
            ),
            125 => 
            array (
                'id' => 15014,
                'city_id' => 23,
                'city_sector_name_fr' => 'ziana',
                'city_sector_status' => 1,
            ),
            126 => 
            array (
                'id' => 15015,
                'city_id' => 23,
                'city_sector_name_fr' => 'bled ',
                'city_sector_status' => 1,
            ),
            127 => 
            array (
                'id' => 15016,
                'city_id' => 23,
                'city_sector_name_fr' => 'borj',
                'city_sector_status' => 1,
            ),
            128 => 
            array (
                'id' => 15017,
                'city_id' => 23,
                'city_sector_name_fr' => 'boujdade',
                'city_sector_status' => 1,
            ),
            129 => 
            array (
                'id' => 15018,
                'city_id' => 23,
                'city_sector_name_fr' => 'dyour el makhezen',
                'city_sector_status' => 1,
            ),
            130 => 
            array (
                'id' => 15019,
                'city_id' => 23,
                'city_sector_name_fr' => 'el ensache',
                'city_sector_status' => 1,
            ),
            131 => 
            array (
                'id' => 15020,
                'city_id' => 23,
                'city_sector_name_fr' => 'el matar',
                'city_sector_status' => 1,
            ),
            132 => 
            array (
                'id' => 15021,
                'city_id' => 23,
                'city_sector_name_fr' => 'hay el mdrassi',
                'city_sector_status' => 1,
            ),
            133 => 
            array (
                'id' => 15022,
                'city_id' => 23,
                'city_sector_name_fr' => 'ennakata',
                'city_sector_status' => 1,
            ),
            134 => 
            array (
                'id' => 15023,
                'city_id' => 23,
                'city_sector_name_fr' => 'essania',
                'city_sector_status' => 1,
            ),
            135 => 
            array (
                'id' => 15024,
                'city_id' => 23,
                'city_sector_name_fr' => 'ichara',
                'city_sector_status' => 1,
            ),
            136 => 
            array (
                'id' => 15025,
                'city_id' => 23,
                'city_sector_name_fr' => 'korat essba',
                'city_sector_status' => 1,
            ),
            137 => 
            array (
                'id' => 15026,
                'city_id' => 23,
                'city_sector_name_fr' => 'laayoune',
                'city_sector_status' => 1,
            ),
            138 => 
            array (
                'id' => 15027,
                'city_id' => 23,
                'city_sector_name_fr' => 'laouziyine',
                'city_sector_status' => 1,
            ),
            139 => 
            array (
                'id' => 15028,
                'city_id' => 23,
                'city_sector_name_fr' => 'masdae',
                'city_sector_status' => 1,
            ),
            140 => 
            array (
                'id' => 15029,
                'city_id' => 23,
                'city_sector_name_fr' => 'mellah ',
                'city_sector_status' => 1,
            ),
            141 => 
            array (
                'id' => 15030,
                'city_id' => 23,
                'city_sector_name_fr' => 'mounia',
                'city_sector_status' => 1,
            ),
            142 => 
            array (
                'id' => 15031,
                'city_id' => 23,
                'city_sector_name_fr' => 'msalla',
                'city_sector_status' => 1,
            ),
            143 => 
            array (
                'id' => 15034,
                'city_id' => 23,
                'city_sector_name_fr' => 'taboula',
                'city_sector_status' => 1,
            ),
            144 => 
            array (
                'id' => 15035,
                'city_id' => 23,
                'city_sector_name_fr' => 'talaa',
                'city_sector_status' => 1,
            ),
            145 => 
            array (
                'id' => 15036,
                'city_id' => 23,
                'city_sector_name_fr' => 'tamouda',
                'city_sector_status' => 1,
            ),
            146 => 
            array (
                'id' => 15037,
                'city_id' => 23,
                'city_sector_name_fr' => 'touabel',
                'city_sector_status' => 1,
            ),
            147 => 
            array (
                'id' => 15038,
                'city_id' => 23,
                'city_sector_name_fr' => 'touilaa foqia',
                'city_sector_status' => 1,
            ),
            148 => 
            array (
                'id' => 15039,
                'city_id' => 23,
                'city_sector_name_fr' => 'trankat',
                'city_sector_status' => 1,
            ),
            149 => 
            array (
                'id' => 15040,
                'city_id' => 23,
                'city_sector_name_fr' => 'wilaya',
                'city_sector_status' => 1,
            ),
            150 => 
            array (
                'id' => 15041,
                'city_id' => 23,
                'city_sector_name_fr' => 'zinat',
                'city_sector_status' => 1,
            ),
            151 => 
            array (
                'id' => 15042,
                'city_id' => 23,
                'city_sector_name_fr' => 'benkarich',
                'city_sector_status' => 1,
            ),
            152 => 
            array (
                'id' => 15043,
                'city_id' => 23,
                'city_sector_name_fr' => 'beghagheza',
                'city_sector_status' => 1,
            ),
            153 => 
            array (
                'id' => 15044,
                'city_id' => 23,
                'city_sector_name_fr' => 'ain hessen',
                'city_sector_status' => 1,
            ),
            154 => 
            array (
                'id' => 15045,
                'city_id' => 23,
                'city_sector_name_fr' => 'bni yeder',
                'city_sector_status' => 1,
            ),
            155 => 
            array (
                'id' => 15046,
                'city_id' => 23,
                'city_sector_name_fr' => 'bni harechen',
                'city_sector_status' => 1,
            ),
            156 => 
            array (
                'id' => 15047,
                'city_id' => 23,
                'city_sector_name_fr' => 'oued lao',
                'city_sector_status' => 1,
            ),
            157 => 
            array (
                'id' => 15048,
                'city_id' => 23,
                'city_sector_name_fr' => 'azla',
                'city_sector_status' => 1,
            ),
            158 => 
            array (
                'id' => 15049,
                'city_id' => 23,
                'city_sector_name_fr' => 'amssa',
                'city_sector_status' => 1,
            ),
            159 => 
            array (
                'id' => 15050,
                'city_id' => 23,
                'city_sector_name_fr' => 'bni said',
                'city_sector_status' => 1,
            ),
            160 => 
            array (
                'id' => 16095,
                'city_id' => 23,
                'city_sector_name_fr' => 'AV DES FAR',
                'city_sector_status' => 1,
            ),
            161 => 
            array (
                'id' => 16006,
                'city_id' => 21,
                'city_sector_name_fr' => 'Kezenaya',
                'city_sector_status' => 1,
            ),
            162 => 
            array (
                'id' => 16008,
                'city_id' => 23,
                'city_sector_name_fr' => 'khandak zerbouh',
                'city_sector_status' => 1,
            ),
            163 => 
            array (
                'id' => 16009,
                'city_id' => 21,
                'city_sector_name_fr' => 'Boukhalef',
                'city_sector_status' => 1,
            ),
            164 => 
            array (
                'id' => 16090,
                'city_id' => 23,
                'city_sector_name_fr' => 'Essahtryiene',
                'city_sector_status' => 1,
            ),
            165 => 
            array (
                'id' => 16091,
                'city_id' => 23,
                'city_sector_name_fr' => 'Jamaa Mezouak',
                'city_sector_status' => 1,
            ),
            166 => 
            array (
                'id' => 16092,
                'city_id' => 23,
                'city_sector_name_fr' => 'Sebt lkedim',
                'city_sector_status' => 1,
            ),
        ));
        
        
    }
}