<?php

it('belongs to an employer', function () {
    //arrange
    $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory()->create([
        'employer_id' => $employer->id
    ]);
    //act

    //assert
    expect($job->employer->is($employer))->toBeTrue();
});

it('can have tags', function () {
    //arrange
    $job = \App\Models\Job::factory()->create();
   

    //act
    $job->tag('Frontend');

    //assert
    expect($job->tags)->toHaveCount(1);
});