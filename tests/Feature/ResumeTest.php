<?php

use App\Models\Resume;
use Database\Seeders\ResumeSeeder;
use Livewire\Livewire;
use Spatie\Browsershot\Browsershot;

beforeEach(function () {
    $this->seed(ResumeSeeder::class);
});

test('homepage displays resume content', function () {
    $resume = Resume::first();

    $this->get('/')
        ->assertOk()
        ->assertSee($resume->full_name)
        ->assertSee($resume->title);
});

test('resume print page displays resume content', function () {
    $resume = Resume::first();

    $this->get(route('resume.print'))
        ->assertOk()
        ->assertSee($resume->full_name)
        ->assertSee('pierre-bultez-dev@terminal');
});

test('can download pdf from resume viewer', function () {
    // On mock Browsershot pour éviter d'avoir besoin de Chrome en test
    $mock = Mockery::mock('overload:' . Browsershot::class);
    $mock->shouldReceive('html')->andReturn($mock);
    $mock->shouldReceive('setNodeBinary')->andReturn($mock);
    $mock->shouldReceive('setNpmBinary')->andReturn($mock);
    $mock->shouldReceive('setChromePath')->andReturn($mock);
    $mock->shouldReceive('setOption')->andReturn($mock);
    $mock->shouldReceive('addChromiumArguments')->andReturn($mock);
    $mock->shouldReceive('emulateMedia')->andReturn($mock);
    $mock->shouldReceive('format')->andReturn($mock);
    $mock->shouldReceive('margins')->andReturn($mock);
    $mock->shouldReceive('showBackground')->andReturn($mock);
    $mock->shouldReceive('waitUntilNetworkIdle')->andReturn($mock);
    $mock->shouldReceive('pdf')->andReturn('fake-pdf-content');

    Livewire::test('resume-viewer')
        ->call('downloadPdf')
        ->assertFileDownloaded('cv-pierre-bultez.pdf');
});
