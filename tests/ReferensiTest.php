<?php

$endpoints = collect([
    'agama' => [
        'method' => 'getAgama',
    ],
    'alasan-hukuman-disiplin' => [
        'method' => 'getAlasanHukumanDisiplin',
    ],
    'asn-jenis-jabatan' => [
        'method' => 'getAsnJenisJabatan',
    ],
    'asn-jenjang-jabatan' => [
        'method' => 'getAsnJenjangJabatan',
    ],
    'eselon' => [
        'method' => 'getEselon',
    ],
    'golongan' => [
        'method' => 'getGolongan',
    ],
    'instansi' => [
        'method' => 'getInstansi',
    ],
    'jabatan-fungsional' => [
        'method' => 'getJabatanFungsional',
    ],
    'jabatan-fungsional-umum' => [
        'method' => 'getJabatanFungsionalUmum',
    ],
    'jenis-anak' => [
        'method' => 'getJenisAnak',
    ],
    'jenis-hukuman' => [
        'method' => 'getJenisHukuman',
    ],
    'jenis-jabatan' => [
        'method' => 'getJenisJabatan',
    ],
    'kanreg' => [
        'method' => 'getKanreg',
    ],
    'kedudukan-hukum' => [
        'method' => 'getKedudukanHukum',
    ],
    'kel-jabatan' => [
        'method' => 'getKelJabatan',
    ],
    'latihan-struktural' => [],
    'lokasi' => [
        'method' => 'getLokasi',
    ],
    'pendidikan' => [
        'method' => 'getPendidikan',
    ],
    'ref-dokumen' => [
        'method' => 'getRefDokumen',
    ],
    'ref-jenjang-jf' => [
        'method' => 'getRefJenjangJf',
    ],
    'satuan-kerja' => [
        'method' => 'getSatuanKerja',
    ],
    'tingkat-pendidikan' => [
        'method' => 'getTingkatPendidikan',
    ],
    'jenis-diklat' => [
        'method' => 'getJenisDiklat',
    ],
])->each(function ($endpoint, $key) {
    $testName = \Illuminate\Support\Str::of($key)
        ->headline()
        ->lower();
    $method = $endpoint['method'];

    it("can {$testName}", function () use ($method) {
        $limit = 10;
        $offset = 0;
        $response = \Kanekescom\Siasn\Referensi\Api\Facades\Referensi::$method([
            'limit' => $limit,
            'offset' => $offset,
        ]);
        $result = $response->collect()->toArray();

        expect($response->successful())->toBeTrue();
        expect($result)->toBeArray();
        // Not all endpoints have the same response format
        // expect($result)->toMatchArray([
        //     'limit' => $limit,
        //     'offset' => $offset,
        // ]);
    });
});
