@extends('layouts.main')

@section('title', 'Home')

@section('container')

<!-- About -->
<div class="pb-3">
    <h1 class="title title--h1 title__separate">Resume</h1>
</div>

<!-- Experience -->
<h2 class="title title--h2"><span class="box icon-box"><i class="font-icon feathericon-book-open"></i></span>Education</h2>
<div class="timeline">
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">University School of the Arts</h5>
        <span class="timeline__period">2007 — 2009</span>
        <p class="timeline__description">Nemo enims ipsam voluptatem, blanditiis praesentium voluptum delenit atque corrupti, quos dolores et quas molestias exceptur.</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">New York Academy of Art</h5>
        <span class="timeline__period">2005 — 2007</span>
        <p class="timeline__description">Ratione voluptatem sequi nesciunt, facere quisquams facere menda ossimus, omnis voluptas assumenda est omnis..</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">High School of Art and Design</h5>
        <span class="timeline__period">2003 — 2005</span>
        <p class="timeline__description">Duis aute irure dolor in reprehenderit in voluptate, quila voluptas  mag odit aut fugit, sed consequuntur magni dolores eos.</p>
    </article>
</div>

<h2 class="title title--h2"><span class="box icon-box"><i class="font-icon feathericon-briefcase"></i></span>Experience</h2>
<div class="timeline">
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">Creative Director</h5>
        <span class="timeline__period">2015 — Present</span>
        <p class="timeline__description">Nemo enim ipsam voluptatem blanditiis praesentium voluptum delenit atque corrupti, quos dolores et qvuas molestias exceptur.</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">Art Director</h5>
        <span class="timeline__period">2013 — 2015</span>
        <p class="timeline__description">Nemo enims ipsam voluptatem, blanditiis praesentium voluptum delenit atque corrupti, quos dolores et quas molestias exceptur.</p>
    </article>
                
    <!-- Item -->
    <article class="timeline__item">
        <h5 class="title title--h4 timeline__title">Web Designer</h5>
        <span class="timeline__period">2010 — 2013</span>
        <p class="timeline__description">Nemo enims ipsam voluptatem, blanditiis praesentium voluptum delenit atque corrupti, quos dolores et quas molestias exceptur.</p>
    </article>
</div>

<!-- Skills -->
<h2 class="title title--h2 mt-3">My Skills</h2>
<div class="box box-inner mb-0">
    <!-- Web Design -->
    <div class="progress">
        <div class="progress-text"><span>Web Design</span> 80%</div>
        <div class="progress-bar"><span role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></span></div>
    </div>

    <!-- Web Design -->
    <div class="progress">
        <div class="progress-text"><span>Graphic Design</span> 75%</div>
        <div class="progress-bar"><span role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></span></div>
    </div>

    <!-- Web Design -->
    <div class="progress">
        <div class="progress-text"><span>Branding</span> 90%</div>
        <div class="progress-bar"><span role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></span></div>
    </div>

    <!-- Web Design -->
    <div class="progress">
        <div class="progress-text"><span>WordPress</span> 50%</div>
        <div class="progress-bar"><span role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></span></div>
    </div>
</div>

@endsection